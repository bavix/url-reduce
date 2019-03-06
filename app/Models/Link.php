<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Link
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $hash
 * @property string $url
 * @property array|null $parameters
 * @property int $active
 * @property string|null $message
 * @property int $blocked
 * @property int $is_porn
 * @property int $suspicious
 * @property int $retry
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $reported_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereBlocked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereIsPorn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereRetry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereSuspicious($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Link whereUrl($value)
 */
class Link extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active', 'hash', 'url'
    ];

    /**
     * @var array
     */
    protected $visible = [
        'hash', 'parameters'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'parameters' => 'array'
    ];

    /**
     * @return Builder
     */
    public static function live(): Builder
    {
        return static::query()
            ->where('active', true)
            ->where('blocked', false)
            ->where('is_porn', false)
            ->whereNotNull('parameters')
            ->orderBy('id', 'desc');
    }

    /**
     * @param string $hash
     * @param bool $live
     * @return Link
     */
    public static function findByHash(string $hash, bool $live = false): Link
    {
        /**
         * @var Link $link
         */
        $link = ($live ? static::live() : static::query())
            ->where('hash', $hash)
            ->firstOrFail();

        abort_if($link->hash !== $hash, 404);
        return $link;
    }

    /**
     * Generates a hash
     *
     * @return string
     */
    public static function generateRandom(): string
    {
        return Str::random(5);
    }

    /**
     * Finding a unique hash
     *
     * @return string
     */
    public static function hashUnique(): string
    {
        do {
            $unique = static::generateRandom();
            $link = static::query()
                ->where('hash', $unique)
                ->first();
        }
        while ($link && $link->hash === $unique);
        return $unique;
    }

    /**
     * @param string $url
     * @return Link
     */
    public static function produce(string $url): Link
    {
        /**
         * @var Link $link
         */
        $link = static::query()
            ->where('url', $url)
            ->first();

        if (!$link) {
            $link = static::query()->create([
                'active' => true,
                'hash' => static::hashUnique(),
                'url' => $url,
            ]);
        }

        return $link;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        $providerIcon = \array_get((array)$this->parameters, 'providerIcon');
        if ($providerIcon && \starts_with($providerIcon, 'https')) {
            return $providerIcon;
        }

        return 'https://ds.bavix.ru/favicon.ico';
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->parameters['title'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->parameters['description'] ?? null;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        if (empty($this->parameters['tags'])) {
            $content = $this->getDescription();

            if (!$content) {
                return [];
            }

            \preg_match_all('~#(\w+)~', $content, $tags);
            return \array_unique($tags[1] ?? []);
        }

        return \array_unique($this->parameters['tags']);
    }

    /**
     * adult content
     *
     * @return bool
     */
    public function isAdult(): bool
    {
        return !$this->suspicious && $this->is_porn;
    }

    /**
     * If the user has followed a link that may be phishing you need to throw a warning
     *
     * @return bool
     */
    public function isWarning(): bool
    {
        if ($this->is_porn || $this->suspicious) {
            return true;
        }

        return !$this->parameters && $this->retry > 0;
    }

}

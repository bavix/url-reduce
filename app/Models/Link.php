<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * Generates a hash
     *
     * @return string
     */
    public static function hash(): string
    {
        return \str_random(5);
    }

    /**
     * Finding a unique hash
     *
     * @return string
     */
    public static function hashUnique(): string
    {
        do {
            $unique = static::hash();
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

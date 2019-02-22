<?php

namespace App\Jobs;

use App\Helpers\Embed;
use App\Models\Link;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateMetadata implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Link
     */
    protected $link;

    /**
     * Create a new job instance.
     *
     * @param Link $link
     */
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * Функция определяет есть ли в мета-информации
     * контент для взрослых
     *
     * @param array $data
     * @return bool
     */
    protected function adults(array $data): bool
    {
        $url = $data['url'] ?? null;
        $words = $data['tags'] ?? [];
        if (!empty($data['title'])) {
            $words = \array_merge([$data['title']], $words);
        }

        $urlRules = config('adults.url', []);
        $wordRules = config('adults.keywords', []);

        foreach ($urlRules as $rule) {
            if (\preg_match($rule, $this->link->url)) {
                return true;
            }

            if ($url && \preg_match($rule, $url)) {
                return true;
            }
        }

        foreach ($wordRules as $rule) {
            foreach ($words as $word) {
                if (\preg_match($rule, $word)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Execute the job.
     * @throws
     */
    public function handle(): void
    {
        $data = Embed::getMeta($this->link->url);

        if (empty($data)) {
            return;
        }

        $this->link->is_porn = $this->adults($data);
        $this->link->parameters = $data;
        $this->link->save();
    }

    /**
     * The job failed to process.
     *
     * @param \Throwable $throwable
     * @return void
     */
    public function failed(\Throwable $throwable): void
    {
        if (++$this->link->retry > 5) {
            $this->link->active = 0;
        }

        $this->link->save();
    }

}

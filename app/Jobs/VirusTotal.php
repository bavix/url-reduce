<?php

namespace App\Jobs;

use App\Models\Link;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class VirusTotal implements ShouldQueue
{

    public const API_URL = 'https://www.virustotal.com/vtapi/v2/url/scan';

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
     * @return string
     */
    protected function getKey(): string
    {
        // todo:
    }

    /**
     * Execute the job.
     * @throws
     */
    public function handle(): void
    {
        $response = (new Client())->post(static::API_URL, [
            'form_params' => [
                'apikey' => $this->getKey(),
                'url' => $this->link->url,
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            return;
        }

        $contents = $response->getBody()->getContents();
        $data = \json_decode($contents);

        if (empty($data['scans'])) {
            return;
        }

        foreach ($data['scans'] as $anti => $datum) {
            if ($datum['detected']) {
                $this->link->blocked = true;
                $this->link->message = $this->link->message ?:
                    $anti . ' found ' . $datum['result'];
                $this->link->save();
                break;
            }
        }
    }

    /**
     * The job failed to process.
     *
     * @param \Throwable $throwable
     * @return void
     */
    public function failed(\Throwable $throwable): void
    {

    }

}

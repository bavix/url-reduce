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

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public const API_URL = 'https://www.virustotal.com/vtapi/v2/url/report';

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
     * Execute the job.
     * @throws
     */
    public function handle(): void
    {
        if (!$this->link->active || $this->link->blocked) {
            // ссылка уже заблокирована
            return;
        }

        try {
            $response = (new Client())->post(static::API_URL, [
                'headers' => [
                    'User-Agent' => config('bx.userAgent'),
                ],
                'form_params' => [
                    'apikey' => config('providers.virusTotal.key'),
                    'resource' => $this->link->url_direction,
                ],
            ]);
        } catch (\Throwable $throwable) {
            $this->release(300);
            return;
        }

        if ($response->getStatusCode() !== 200) {
            $this->release(900);
            return;
        }

        $contents = $response->getBody()->getContents();
        $data = \json_decode($contents, true);

        if (empty($data['scans'])) {
            return;
        }

        $this->link->blocked = false;
        foreach ($data['scans'] as $anti => $datum) {
            if ($datum['detected']) {
                $this->link->blocked = true;
                $this->link->message = $this->link->message ?:
                    $anti . ' found ' . $datum['result'];
                break;
            }
        }

        $this->link->save();
    }

}

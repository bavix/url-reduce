<?php

namespace App\Jobs;

use App\Models\Link;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class PhishTank implements ShouldQueue
{

    public const API_URL = 'https://phishtank.com/checkurl/';

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
     * Execute the job.
     * @throws
     */
    public function handle(): void
    {
        $response = (new Client())->post(static::API_URL, [
            'form_params' => [
                'app_key' => config('providers.phishtank.key'),
                'format' => 'json',
                'url' => $this->link->url,

            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            return;
        }

        $contents = $response->getBody()->getContents();
        $data = \json_decode($contents, true);

        if (empty($data['results'])) {
            return;
        }

        $results = $data['results'];
        $this->link->blocked = $results['in_database'] && $results['valid'];

        if ($this->link->blocked) {
            $this->link->message = 'URL is a phish! ' .
                'In more detail according to the reference ' .
                $results['phish_detail_page'];
        }

        $this->link->save();
    }

}

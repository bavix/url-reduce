<?php

namespace App\Console\Commands\Providers;

use Bavix\Helpers\JSON;

class PhishTank extends Provider
{

    protected $uri = 'https://phishtank.com/checkurl/';
    protected $key = 'PHISHTANK_API_KEY';

    protected $apiKey;

    protected function apiKey()
    {
        if (!$this->apiKey)
        {
            $this->apiKey = env($this->key);
        }

        return $this->apiKey;
    }

    protected function validator()
    {
        $ch = $this->req($this->uri, [
            'app_key' => $this->apiKey(),
            'format'  => 'json',
            'url'     => $this->link->url,
        ]);

        $result      = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ((int)$status_code === 200)
        {
            $data = JSON::decode($result);

            $results = $data['results'] ?? [];

            if (!empty($results['in_database']) && !empty($results['valid']))
            {
                $this->link->blocked = true;

                if (null === $this->link->message)
                {
                    $this->link->message = 'URL is a phish! ' .
                        'In more detail according to the reference ' .
                        $results['phish_detail_page'];
                }

                $this->command->info($this->link->message);
                $this->link->save();
            }
        }

        curl_close($ch);
    }

    public function run()
    {
        if (null === $this->apiKey())
        {
            $this->command->warn('API key not found ' . __METHOD__);

            return;
        }

        // if not api key OR blocked OR not active
        if ($this->link->blocked || !$this->link->active)
        {
            $this->command->warn('URL is blocked or not active!');

            return;
        }

        $this->validator();
    }

}

<?php

namespace App\Console\Commands\Providers;

use App\Console\Commands\SitemapCommand;
use Bavix\Helpers\JSON;

class VirusTotal extends PhishTank
{

    protected $uri = 'https://www.virustotal.com/vtapi/v2/url/report';
    protected $key = 'VT_API_KEY';

    protected function validator()
    {

        $ch = $this->req($this->uri, [
            'apikey'   => $this->apiKey(),
            'resource' => $this->link->url,
        ]);

        $result      = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ((int)$status_code === 200)
        {
            $data = JSON::decode($result);

            if (isset($data['scans']))
            {
                foreach ($data['scans'] as $antiVirus => $mixed)
                {
                    $this->command->info('' . $antiVirus . ': ' . $mixed['result']);
                    if ($mixed['detected'])
                    {
                        $this->link->blocked = true;

                        if (null === $this->link->message)
                        {
                            $this->link->message = $antiVirus . ' found ' . $mixed['result'];
                        }

                        $this->link->save();
                        break;
                    }
                }
            }
        }

        if (!$this->link->blocked)
        {
            $this->doBackground(SitemapCommand::TASK_SITE_MAP);
        }

        curl_close($ch);

    }

}

<?php

namespace App\Console\Commands\Providers;

use App\Models\Link;
use Bavix\Gearman\Client;
use GearmanJob as Job;
use Embed\Http\CurlDispatcher;
use Illuminate\Console\Command;

abstract class Provider implements Runner
{

    /**
     * @var string
     */
    protected $userAgent = 'Mozilla/5.0 (compatible; bavix/metabot-v2.2; +https://bavix.ru/bot.html)';

    /**
     * @var CurlDispatcher
     */
    protected $dispatcher;

    /**
     * @var Command
     */
    protected $command;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Link $link
     */
    protected $link;

    /**
     * MetaData constructor.
     *
     * @param Command $command
     * @param Job     $job
     */
    public function __construct(Command $command, Job $job)
    {
        $workload      = $job->workload();
        $this->command = $command;
        $this->link    = \unserialize($workload, []);
    }

    /**
     * @return Client
     */
    protected function client(): Client
    {
        if (!$this->client)
        {
            $this->client = new Client();
            $this->client->addServer(
                config('gearman.host'),
                config('gearman.port')
            );
        }

        return $this->client;
    }

    /**
     * @return CurlDispatcher
     */
    protected function dispatcher(): CurlDispatcher
    {
        if (!$this->dispatcher)
        {
            $this->dispatcher = new CurlDispatcher([
                CURLOPT_MAXREDIRS      => 20,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_TIMEOUT        => 5,
                CURLOPT_ENCODING       => 'UTF-8',
                CURLOPT_AUTOREFERER    => true,
                CURLOPT_USERAGENT      => $this->userAgent,
                CURLOPT_IPRESOLVE      => CURL_IPRESOLVE_V4,

                CURLOPT_HTTPHEADER => [
                    'Accept-Language: en,en-US;q=0.8,ru;q=0.6'
                ],

                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER         => false,
            ]);
        }

        return $this->dispatcher;
    }

    /**
     * @param string $uri
     * @param array  $data
     *
     * @return resource
     */
    protected function req(string $uri, array $data)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        return $ch;
    }

    /**
     * @param string $name
     */
    protected function doLowBackground($name) : void
    {
        $this->client()->doLowBackground($name, \serialize($this->link));
    }

    /**
     * @param string $name
     */
    protected function doBackground($name) : void
    {
        $this->client()->doBackground($name, \serialize($this->link));
    }

    /**
     * @param string $name
     */
    protected function doHighBackground($name) : void
    {
        $this->client()->doHighBackground($name, \serialize($this->link));
    }

    /**
     * @return void
     */
    abstract public function run();

}

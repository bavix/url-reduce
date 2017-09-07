<?php

namespace App\Console\Commands\Providers;

use App\Console\Commands\GearmanCommand;
use Bavix\Helpers\JSON;

class PornEmbed extends Provider
{

    protected function url(array $parameters)
    {
        // url
        $rules = config('porn.url', []);
        $url = $parameters['url'] ?? null;

        // config rules
        foreach ($rules as $rule)
        {
            $this->command->warn('Check rule [type=url] "' . $rule . '" on link ' . $this->link->url);
            if (preg_match($rule, $this->link->url) || ($url && preg_match($rule, $url)))
            {
                $this->command->info('Porn content is found! `' . $rule . '` from url ' . $this->link->url);
                $this->link->is_porn = 1;
                $this->link->save();

                return;
            }
        }
    }

    protected function keywords(array $parameters)
    {
        // if url is porn website
        if ($this->link->is_porn)
        {
            return;
        }

        // title | description
        $rules = config('porn.keywords', []);

        $words  = $parameters['tags'] ?? [];

        if (!empty($parameters['title']))
        {
            $words = array_merge([$parameters['title']], $words);
        }

        // config rules
        foreach ($rules as $rule)
        {
            $this->command->warn('Check rule [type=keywords] "' . $rule . '" on link ' . $this->link->url);

            foreach ($words as $word)
            {
                if (preg_match($rule, $word))
                {
                    $this->command->info('Porn content is found! `' . $word . '` from url ' . $this->link->url);
                    $this->link->is_porn = 1;
                    $this->link->save();

                    return;
                }
            }
        }
    }

    public function run()
    {
        if (!$this->link->active || $this->link->blocked)
        {
            return;
        }

        $data = JSON::decode($this->link->parameters) ?: [];

        $this->url($data);
        $this->keywords($data);

        if ($this->link->is_porn)
        {
            $this->doHighBackground(GearmanCommand::TASK_VIRUS);
            return;
        }

        $this->doLowBackground(GearmanCommand::TASK_VIRUS);
    }

}

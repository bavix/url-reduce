<?php

namespace App\Console\Commands\Providers;

use App\Console\Commands\GearmanCommand;
use App\Helpers\Embed as EmbedLoader;
use Bavix\Helpers\JSON;

class Embed extends Provider
{

    protected function loadMeta()
    {
        $this->link->parameters = JSON::encode(
            $data = EmbedLoader::read(
                $this->link->url,
                null,
                $this->dispatcher()
            )
        );

        if ($data && $data['url'] === $data['title'])
        {
            $this->link->retry++;
            $this->link->save();

            $this->command->warn('Retry model link');
            $this->doBackground(GearmanCommand::TASK_EMBED);

            return;
        }

        $this->command->info('embed: ' . $this->link->parameters);
        $this->link->retry = 0;
        $this->link->save();
    }

    public function run()
    {
        try
        {
            $this->loadMeta();
            $this->doBackground(GearmanCommand::TASK_PORN);
        }
        catch (\Throwable $throwable)
        {
            $this->command->info('Disabled link #' . $this->link->id);
            $this->link->active = 0;
            $this->link->save();
        }
    }

}

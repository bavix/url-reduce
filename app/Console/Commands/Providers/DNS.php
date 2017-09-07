<?php

namespace App\Console\Commands\Providers;

use App\Console\Commands\GearmanCommand;

class DNS extends Provider
{

    public function run()
    {
        $this->command->info('DNS checker: ' . $this->link->url);

        if ($this->link->retry)
        {
            $this->command->warn('retry > 1');
            return;
        }

        $this->link->retry++;
        $this->link->save();

        $host = parse_url($this->link->url, PHP_URL_HOST);

        $dns = dns_get_record($host);

        if (!empty($dns))
        {
            $this->command->info(var_export($dns, true));
            $this->doHighBackground(GearmanCommand::TASK_EMBED);
            return;
        }

        $this->command->warn('DNS record is empty!');
        $this->link->active = 0;
        $this->link->save();
    }

}

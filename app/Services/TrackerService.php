<?php

namespace App\Services;

use App\Models\Link;
use App\Models\Tracker;

class TrackerService
{

    /**
     * @return bool
     */
    public function hit(): bool
    {
        if (request()->route()->getName() === 'direct') {
            return false;
        }

        return $this->track(null);
    }

    /**
     * @param Link $link
     * @return bool
     */
    public function redirect(Link $link): bool
    {
        return $this->track($link);
    }

    /**
     * @param Link|null $link
     * @return bool
     */
    protected function track(?Link $link): bool
    {
        try {
            return (bool)Tracker::hit($link);
        } catch (\Throwable $throwable) {
            return false;
        }
    }

}

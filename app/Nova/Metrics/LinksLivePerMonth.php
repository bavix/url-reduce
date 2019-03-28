<?php

namespace App\Nova\Metrics;

use App\Models\Link;
use Illuminate\Http\Request;

class LinksLivePerMonth extends LinksPerMonth
{

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->countByMonths($request, Link::live());
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey(): string
    {
        return 'links-live-per-month';
    }

}

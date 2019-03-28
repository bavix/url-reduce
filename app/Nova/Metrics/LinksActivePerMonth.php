<?php

namespace App\Nova\Metrics;

use App\Models\Link;
use Illuminate\Http\Request;

class LinksActivePerMonth extends LinksPerMonth
{

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        $query = Link::query()->where('active', 1);
        return $this->countByMonths($request, $query);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey(): string
    {
        return 'links-active-per-month';
    }

}

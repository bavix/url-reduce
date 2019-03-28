<?php

namespace App\Nova\Metrics;

use App\Models\Link;
use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Trend;

class LinksPerMonth extends Trend
{

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->countByMonths($request, Link::class);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges(): array
    {
        return [
            6 => 'six months',
            9 => 'nine months',
            12 => 'one year',
            24 => 'two years',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
         return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey(): string
    {
        return 'links-per-month';
    }

}

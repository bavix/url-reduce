<?php

namespace App\Nova\Metrics;

use App\Models\Link;
use Illuminate\Http\Request;

class LinksBlockedPerDay extends LinksPerMonth
{

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        $query = Link::where('blocked', 1);
        return $this->countByDays($request, $query->getUpdatedAtColumn());
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges(): array
    {
        return [
            7 => 'seven days',
            14 => 'fourteen days',
            28 => 'twenty eight days',
            42 => 'forty-two days',
        ];
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey(): string
    {
        return 'links-blocked-per-day';
    }

}

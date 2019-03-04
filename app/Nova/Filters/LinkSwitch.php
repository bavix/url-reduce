<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\BooleanFilter;

class LinkSwitch extends BooleanFilter
{

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        foreach ($value as $column => $item) {
            if ($item) {
                $query->where($column, $item);
            }
        }

        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request): array
    {
        return [
            'Active' => 'active',
            'Blocked' => 'blocked',
            'Is Porn' => 'is_porn',
            'Suspicious' => 'suspicious',
        ];
    }

}

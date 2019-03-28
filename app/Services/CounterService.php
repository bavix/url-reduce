<?php

namespace App\Services;

use App\Models\Counter;

class CounterService
{

    /**
     * @return Counter[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get()
    {
        return Counter::query()
            ->where('active', 1)
            ->get();
    }

}

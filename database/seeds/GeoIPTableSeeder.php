<?php

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeoIPTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var $builder Builder
         */
        $builder = DB::table('geo_ips');
        $builder->truncate();

        $builder->insert([
            [
                // 0.0.0.0 => 0.255.255.255
                'from' => 0,
                'to'   => 16777215,
            ],
            [
                // 127.0.0.0 => 127.255.255.255
                'from' => 2130706432,
                'to'   => 2147483647,
            ],
            [
                // 192.168.0.0 => 192.168.255.255
                'from' => 3232235520,
                'to'   => 3232301055,
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class LanguageTableSeeder extends Seeder
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
        $builder = DB::table('languages');
        $builder->truncate();

        $builder->insert([
            [
                'title'  => 'Русский',
                'locale' => 'ru'
            ],
            [
                'title'  => 'English',
                'locale' => 'en'
            ]
        ]);
    }
}

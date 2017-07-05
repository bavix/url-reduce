<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class NotifyTableSeeder extends Seeder
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
        $builder = DB::table('notifies');
        $builder->truncate();
        $builder->insert(array(
            array('id' => '1', 'content' => 'Данный сайт использует <strong>cookie</strong>-файлы, а также собирает данные об <strong>IP</strong>-адресе.
        Продолжая использовать данный ресурс, Вы автоматически соглашаетесь с использованием данных технологий.', 'active' => '1', 'created_at' => '2017-07-05 15:28:44', 'updated_at' => '2017-07-05 16:03:37')
        ));
    }
}

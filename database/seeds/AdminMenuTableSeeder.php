<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class AdminMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
            array('id' => '1','parent_id' => '0','order' => '1','title' => 'Dashboard','icon' => 'fa-bar-chart','uri' => '/','created_at' => NULL,'updated_at' => '2017-07-12 14:51:17'),
            array('id' => '2','parent_id' => '0','order' => '6','title' => 'Admin','icon' => 'fa-tasks','uri' => '','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '3','parent_id' => '2','order' => '7','title' => 'Users','icon' => 'fa-users','uri' => 'auth/users','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '4','parent_id' => '2','order' => '8','title' => 'Roles','icon' => 'fa-user','uri' => 'auth/roles','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '5','parent_id' => '2','order' => '9','title' => 'Permission','icon' => 'fa-user','uri' => 'auth/permissions','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '6','parent_id' => '2','order' => '10','title' => 'Menu','icon' => 'fa-bars','uri' => 'auth/menu','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '7','parent_id' => '2','order' => '11','title' => 'Operation log','icon' => 'fa-history','uri' => 'auth/logs','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '8','parent_id' => '0','order' => '12','title' => 'Helpers','icon' => 'fa-gears','uri' => '','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '9','parent_id' => '8','order' => '13','title' => 'Scaffold','icon' => 'fa-keyboard-o','uri' => 'helpers/scaffold','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '10','parent_id' => '8','order' => '14','title' => 'Database terminal','icon' => 'fa-database','uri' => 'helpers/terminal/database','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '11','parent_id' => '8','order' => '15','title' => 'Laravel artisan','icon' => 'fa-terminal','uri' => 'helpers/terminal/artisan','created_at' => NULL,'updated_at' => '2017-07-12 14:53:37'),
            array('id' => '12','parent_id' => '0','order' => '3','title' => 'Links','icon' => 'fa-link','uri' => '/links','created_at' => '2017-07-12 14:51:36','updated_at' => '2017-07-12 14:53:37'),
            array('id' => '13','parent_id' => '0','order' => '4','title' => 'Counters','icon' => 'fa-forumbee','uri' => '/counters','created_at' => '2017-07-12 14:52:39','updated_at' => '2017-07-12 14:53:37'),
            array('id' => '14','parent_id' => '0','order' => '5','title' => 'Trackers','icon' => 'fa-star','uri' => '/trackers','created_at' => '2017-07-12 14:53:10','updated_at' => '2017-07-12 14:53:37'),
            array('id' => '15','parent_id' => '0','order' => '2','title' => 'Configure','icon' => 'fa-bars','uri' => '/config','created_at' => '2017-07-12 14:53:33','updated_at' => '2017-07-12 14:53:37')
        );

        /**
         * @var $builder Builder
         */
        $builder = DB::table('admin_menu');
        $builder->truncate();
        $builder->insert($array);
    }
}

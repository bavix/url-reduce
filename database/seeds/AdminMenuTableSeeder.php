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
            array('id' => '1','parent_id' => '0','order' => '1','title' => 'Приборная панель','icon' => 'fa-bar-chart','uri' => '/','created_at' => NULL,'updated_at' => null),
            array('id' => '2','parent_id' => '0','order' => '15','title' => 'Admin','icon' => 'fa-tasks','uri' => '','created_at' => NULL,'updated_at' => null),
            array('id' => '3','parent_id' => '2','order' => '16','title' => 'Users','icon' => 'fa-users','uri' => 'auth/users','created_at' => NULL,'updated_at' => null),
            array('id' => '4','parent_id' => '2','order' => '17','title' => 'Roles','icon' => 'fa-user','uri' => 'auth/roles','created_at' => NULL,'updated_at' => null),
            array('id' => '5','parent_id' => '2','order' => '18','title' => 'Permission','icon' => 'fa-user','uri' => 'auth/permissions','created_at' => NULL,'updated_at' => null),
            array('id' => '6','parent_id' => '2','order' => '19','title' => 'Menu','icon' => 'fa-bars','uri' => 'auth/menu','created_at' => NULL,'updated_at' => null),
            array('id' => '7','parent_id' => '2','order' => '20','title' => 'Operation log','icon' => 'fa-history','uri' => 'auth/logs','created_at' => NULL,'updated_at' => null),
            array('id' => '8','parent_id' => '0','order' => '21','title' => 'Helpers','icon' => 'fa-gears','uri' => '','created_at' => NULL,'updated_at' => null),
            array('id' => '9','parent_id' => '8','order' => '22','title' => 'Scaffold','icon' => 'fa-keyboard-o','uri' => 'helpers/scaffold','created_at' => NULL,'updated_at' => null),
            array('id' => '10','parent_id' => '8','order' => '23','title' => 'Database terminal','icon' => 'fa-database','uri' => 'helpers/terminal/database','created_at' => NULL,'updated_at' => null),
            array('id' => '11','parent_id' => '8','order' => '24','title' => 'Laravel artisan','icon' => 'fa-terminal','uri' => 'helpers/terminal/artisan','created_at' => NULL,'updated_at' => null),
            array('id' => '12','parent_id' => '0','order' => '7','title' => 'Контент','icon' => 'fa-newspaper-o','uri' => '/news','created_at' => null,'updated_at' => null),
            array('id' => '13','parent_id' => '0','order' => '14','title' => 'Альбомы','icon' => 'fa-picture-o','uri' => '/albums','created_at' => null,'updated_at' => null),
            array('id' => '14','parent_id' => '0','order' => '11','title' => 'Опросник','icon' => 'fa-question-circle','uri' => '/polls','created_at' => null,'updated_at' => null),
            array('id' => '15','parent_id' => '0','order' => '3','title' => 'Подача заявлений','icon' => 'fa-user-plus','uri' => '/statements','created_at' => null,'updated_at' => null),
            array('id' => '16','parent_id' => '12','order' => '9','title' => 'Категории','icon' => 'fa-hashtag','uri' => '/categories','created_at' => null,'updated_at' => null),
            array('id' => '17','parent_id' => '15','order' => '5','title' => 'Кружки','icon' => 'fa-child','uri' => '/types','created_at' => null,'updated_at' => null),
            array('id' => '18','parent_id' => '15','order' => '4','title' => 'Заявления','icon' => 'fa-user-plus','uri' => '/statements','created_at' => null,'updated_at' => null),
            array('id' => '19','parent_id' => '12','order' => '8','title' => 'Новости','icon' => 'fa-newspaper-o','uri' => '/news','created_at' => null,'updated_at' => null),
            array('id' => '20','parent_id' => '0','order' => '2','title' => 'Ссылки','icon' => 'fa-link','uri' => '/links','created_at' => null,'updated_at' => null),
            array('id' => '21','parent_id' => '14','order' => '12','title' => 'Опросы','icon' => 'fa-area-chart','uri' => '/polls','created_at' => null,'updated_at' => null),
            array('id' => '22','parent_id' => '14','order' => '13','title' => 'Вопросы','icon' => 'fa-question-circle','uri' => '/questions','created_at' => null,'updated_at' => null),
            array('id' => '23','parent_id' => '12','order' => '10','title' => 'Страницы','icon' => 'fa-file-text','uri' => '/pages','created_at' => null,'updated_at' => null),
            array('id' => '24','parent_id' => '0','order' => '6','title' => 'Обратная связь','icon' => 'fa-feed','uri' => '/feedback','created_at' => null,'updated_at' => null),
            array('id' => '25','parent_id' => '2','order' => '25','title' => 'Конфигурации','icon' => 'fa-sliders','uri' => '/config','created_at' => null,'updated_at' => null)
        );

        /**
         * @var $builder Builder
         */
        $builder = DB::table('admin_menu');
        $builder->truncate();
        $builder->insert($array);
    }
}

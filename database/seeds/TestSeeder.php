<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class TestSeeder extends Seeder
{

    protected function seed($table, array $storage)
    {
        /**
         * @var $builder Builder
         */
        $builder = DB::table($table);
        $builder->truncate();
        $builder->insert($storage);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        /**
         * Database `sot1`
         */

        /* `sot1`.`albums` */
        $albums = array(
            array('id' => '1','title' => 'Обои','description' => 'Интересные обои','image_id' => '91','active' => '1','created_at' => '2017-05-24 13:23:17','updated_at' => '2017-05-25 12:36:54'),
            array('id' => '2','title' => 'Картины великих художников','description' => 'Подборка известных картин','image_id' => '92','active' => '1','created_at' => '2017-05-24 13:28:46','updated_at' => '2017-05-25 12:37:11')
        );

        $this->seed('albums', $albums);

        /* `sot1`.`albums_images` */
        $albums_images = array(
            array('id' => '1','album_model_id' => '2','image_model_id' => '24'),
            array('id' => '2','album_model_id' => '2','image_model_id' => '25'),
            array('id' => '3','album_model_id' => '2','image_model_id' => '26'),
            array('id' => '4','album_model_id' => '2','image_model_id' => '27'),
            array('id' => '5','album_model_id' => '2','image_model_id' => '28'),
            array('id' => '6','album_model_id' => '2','image_model_id' => '29'),
            array('id' => '7','album_model_id' => '2','image_model_id' => '30'),
            array('id' => '8','album_model_id' => '2','image_model_id' => '31'),
            array('id' => '9','album_model_id' => '2','image_model_id' => '32'),
            array('id' => '10','album_model_id' => '2','image_model_id' => '33'),
            array('id' => '11','album_model_id' => '2','image_model_id' => '34'),
            array('id' => '12','album_model_id' => '2','image_model_id' => '35'),
            array('id' => '13','album_model_id' => '2','image_model_id' => '36'),
            array('id' => '14','album_model_id' => '2','image_model_id' => '37'),
            array('id' => '15','album_model_id' => '2','image_model_id' => '38'),
            array('id' => '16','album_model_id' => '2','image_model_id' => '39'),
            array('id' => '17','album_model_id' => '2','image_model_id' => '40'),
            array('id' => '18','album_model_id' => '2','image_model_id' => '41'),
            array('id' => '19','album_model_id' => '2','image_model_id' => '42'),
            array('id' => '20','album_model_id' => '2','image_model_id' => '43'),
            array('id' => '21','album_model_id' => '2','image_model_id' => '44'),
            array('id' => '22','album_model_id' => '2','image_model_id' => '45'),
            array('id' => '23','album_model_id' => '2','image_model_id' => '46'),
            array('id' => '24','album_model_id' => '2','image_model_id' => '47'),
            array('id' => '25','album_model_id' => '2','image_model_id' => '48'),
            array('id' => '26','album_model_id' => '2','image_model_id' => '49'),
            array('id' => '27','album_model_id' => '2','image_model_id' => '50'),
            array('id' => '28','album_model_id' => '2','image_model_id' => '51'),
            array('id' => '29','album_model_id' => '2','image_model_id' => '52'),
            array('id' => '30','album_model_id' => '2','image_model_id' => '53'),
            array('id' => '31','album_model_id' => '2','image_model_id' => '54'),
            array('id' => '32','album_model_id' => '2','image_model_id' => '55'),
            array('id' => '33','album_model_id' => '2','image_model_id' => '56'),
            array('id' => '34','album_model_id' => '2','image_model_id' => '57'),
            array('id' => '35','album_model_id' => '2','image_model_id' => '58'),
            array('id' => '36','album_model_id' => '2','image_model_id' => '59'),
            array('id' => '37','album_model_id' => '2','image_model_id' => '60'),
            array('id' => '38','album_model_id' => '2','image_model_id' => '61'),
            array('id' => '39','album_model_id' => '2','image_model_id' => '62'),
            array('id' => '40','album_model_id' => '1','image_model_id' => '63'),
            array('id' => '41','album_model_id' => '1','image_model_id' => '64'),
            array('id' => '42','album_model_id' => '1','image_model_id' => '65'),
            array('id' => '43','album_model_id' => '1','image_model_id' => '66'),
            array('id' => '44','album_model_id' => '1','image_model_id' => '67'),
            array('id' => '45','album_model_id' => '1','image_model_id' => '68'),
            array('id' => '46','album_model_id' => '1','image_model_id' => '69'),
            array('id' => '47','album_model_id' => '1','image_model_id' => '70'),
            array('id' => '48','album_model_id' => '1','image_model_id' => '71'),
            array('id' => '49','album_model_id' => '1','image_model_id' => '72'),
            array('id' => '50','album_model_id' => '1','image_model_id' => '73'),
            array('id' => '51','album_model_id' => '1','image_model_id' => '74'),
            array('id' => '52','album_model_id' => '1','image_model_id' => '75'),
            array('id' => '53','album_model_id' => '1','image_model_id' => '76'),
            array('id' => '54','album_model_id' => '1','image_model_id' => '77'),
            array('id' => '55','album_model_id' => '1','image_model_id' => '78'),
            array('id' => '56','album_model_id' => '1','image_model_id' => '79'),
            array('id' => '57','album_model_id' => '1','image_model_id' => '80'),
            array('id' => '58','album_model_id' => '1','image_model_id' => '81'),
            array('id' => '59','album_model_id' => '1','image_model_id' => '82'),
            array('id' => '60','album_model_id' => '1','image_model_id' => '83')
        );

        $this->seed('albums_images', $albums_images);

        /* `sot1`.`answers` */
        $answers = array(
            array('id' => '1','answer' => 'ответ 1','count' => '0','question_id' => '1','created_at' => '2017-05-24 06:50:27','updated_at' => '2017-05-24 06:50:27'),
            array('id' => '2','answer' => 'ответ 2','count' => '0','question_id' => '1','created_at' => '2017-05-24 06:50:27','updated_at' => '2017-05-24 06:50:27'),
            array('id' => '3','answer' => 'Современная перьевая ручка','count' => '13','question_id' => '2','created_at' => '2017-05-24 07:23:39','updated_at' => '2017-06-19 16:50:50'),
            array('id' => '4','answer' => 'Шариковая ручка','count' => '5','question_id' => '2','created_at' => '2017-05-24 07:23:39','updated_at' => '2017-05-25 10:33:43'),
            array('id' => '5','answer' => 'Parker','count' => '9','question_id' => '3','created_at' => '2017-05-24 22:26:32','updated_at' => '2017-05-25 13:19:59'),
            array('id' => '6','answer' => 'Waterman','count' => '11','question_id' => '3','created_at' => '2017-05-24 22:26:32','updated_at' => '2017-05-25 10:37:21'),
            array('id' => '7','answer' => 'Капиллярная ручка','count' => '1','question_id' => '2','created_at' => '2017-05-25 09:53:56','updated_at' => '2017-05-25 10:33:43'),
            array('id' => '8','answer' => 'Роллерная ручка','count' => '0','question_id' => '2','created_at' => '2017-05-25 10:33:43','updated_at' => '2017-05-25 10:33:43'),
            array('id' => '9','answer' => 'Гелевая ручка','count' => '0','question_id' => '2','created_at' => '2017-05-25 10:33:43','updated_at' => '2017-05-25 10:33:43'),
            array('id' => '10','answer' => 'Знаю все типы ручек','count' => '3','question_id' => '2','created_at' => '2017-05-25 10:34:56','updated_at' => '2017-05-25 13:48:58'),
            array('id' => '11','answer' => 'Caran d\'Ache','count' => '0','question_id' => '3','created_at' => '2017-05-25 10:37:21','updated_at' => '2017-05-25 10:37:21'),
            array('id' => '12','answer' => 'Graf von Faber-Castell','count' => '0','question_id' => '3','created_at' => '2017-05-25 10:37:21','updated_at' => '2017-05-25 10:37:21'),
            array('id' => '13','answer' => 'Cross','count' => '0','question_id' => '3','created_at' => '2017-05-25 10:37:21','updated_at' => '2017-05-25 10:37:21'),
            array('id' => '14','answer' => 'Aurora','count' => '0','question_id' => '3','created_at' => '2017-05-25 10:37:21','updated_at' => '2017-05-25 10:37:21'),
            array('id' => '15','answer' => 'Visconti','count' => '0','question_id' => '3','created_at' => '2017-05-25 10:37:21','updated_at' => '2017-05-25 10:37:21'),
            array('id' => '16','answer' => 'Ancora','count' => '0','question_id' => '3','created_at' => '2017-05-25 10:37:21','updated_at' => '2017-05-25 10:37:21'),
            array('id' => '17','answer' => 'Pierre Cardin','count' => '0','question_id' => '3','created_at' => '2017-05-25 10:37:21','updated_at' => '2017-05-25 10:37:21'),
            array('id' => '18','answer' => 'другой','count' => '2','question_id' => '3','created_at' => '2017-05-25 10:37:21','updated_at' => '2017-06-19 16:50:50')
        );

        $this->seed('answers', $answers);

        /* `sot1`.`categories` */
        $categories = array(
            array('id' => '2','title' => 'информационные технологии','created_at' => '2017-05-22 07:16:36','updated_at' => '2017-05-24 06:06:00'),
            array('id' => '3','title' => 'тестовая','created_at' => '2017-05-22 07:45:00','updated_at' => '2017-05-22 13:35:08')
        );

        $this->seed('categories', $categories);

        /* `sot1`.`documents` */
        $documents = array(
            array('id' => '1','title' => '','src' => 'file/b29d83e49ab16a610e1d1e0f5d79293e.txt','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '2','title' => '','src' => 'file/f087de608708b84e2171074eddef3482.','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '3','title' => '','src' => 'file/3fe0dd945bb49d26ea1cb705880cec64.html','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '4','title' => '','src' => 'file/0a6ce2d8bfcbcba58ec5a9bacd3be33a.xml','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '5','title' => '','src' => 'file/17ea12f6383a9c68501528ad59be0135.txt','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '6','title' => '','src' => 'file/7af4891593ab3a2f0bfa950c33d5242b.txt','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '7','title' => '','src' => 'file/3597ea71f207c6516780053d47c82ff6.txt','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '8','title' => '','src' => 'file/b9c0cee5da7c5bb09067e9f80ce27ec4.txt','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '9','title' => '','src' => 'file/fc4c2841b64ddb085c32c754a2ae002b.txt','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '10','title' => '','src' => 'file/da87faba8d5eff83844f7fa2e36bd67e.txt','created_at' => '2017-05-24 08:34:20','updated_at' => '2017-05-24 08:34:20'),
            array('id' => '11','title' => '','src' => 'file/package.json','created_at' => '2017-05-24 11:37:02','updated_at' => '2017-05-24 11:37:02'),
            array('id' => '12','title' => '','src' => 'file/32a41c5ee04df0acb05a8bdfa34f2d85.txt','created_at' => '2017-05-24 11:37:02','updated_at' => '2017-05-24 11:37:02'),
            array('id' => '13','title' => '','src' => 'file/53565cf9ecd2a5621ed6749c6cf09549.txt','created_at' => '2017-05-24 11:37:02','updated_at' => '2017-05-24 11:37:02'),
            array('id' => '14','title' => 'composer.json','src' => 'file/lXF2JhgK/composer.json','created_at' => '2017-06-05 15:26:07','updated_at' => '2017-06-05 15:26:07')
        );

        $this->seed('documents', $documents);

        /* `sot1`.`feedback` */
        $feedback = array(
            array('id' => '1','communication' => 'dsfsdfsdf','content' => 'sdfsdfsdf','created_at' => '2017-06-05 10:50:38','updated_at' => '2017-06-05 10:50:38'),
            array('id' => '2','communication' => 'sdfsdf','content' => 'sfdfsd','created_at' => '2017-06-05 10:52:38','updated_at' => '2017-06-05 10:52:38'),
            array('id' => '3','communication' => 'sdfsdfsdf','content' => 'sdfsdfsdf','created_at' => '2017-06-05 10:53:49','updated_at' => '2017-06-05 10:53:49'),
            array('id' => '4','communication' => 'sdfsdfsdf','content' => 'sdfsdfsdf','created_at' => '2017-06-05 10:53:53','updated_at' => '2017-06-05 10:53:53'),
            array('id' => '5','communication' => 'asdasdasd','content' => 'asdasdasdas','created_at' => '2017-06-20 13:58:36','updated_at' => '2017-06-20 13:58:36')
        );

        $this->seed('feedback', $feedback);

        /* `sot1`.`images` */
        $images = array(
            array('id' => '1','src' => 'image/6f8f85e72bbbd145556d64e8cc23dbc6.jpeg','created_at' => '2017-05-23 07:51:22','updated_at' => '2017-05-24 12:16:03'),
            array('id' => '2','src' => 'image/04760359f6dc4e013af89dabf9015379.jpeg','created_at' => '2017-05-23 07:51:22','updated_at' => '2017-05-24 12:16:03'),
            array('id' => '3','src' => 'image/73f4c57f3fa1b2259e021e0e8c3ce1e7.png','created_at' => '2017-05-23 07:51:22','updated_at' => '2017-05-24 12:16:03'),
            array('id' => '4','src' => 'image/7caa9a501940879e0fc3f89774437982.png','created_at' => '2017-05-23 07:53:12','updated_at' => '2017-05-24 12:16:03'),
            array('id' => '5','src' => 'image/47ea573772005d3bdac5f5369a7e8a03.png','created_at' => '2017-05-23 07:53:12','updated_at' => '2017-05-24 12:16:03'),
            array('id' => '6','src' => 'image/e80e62d5184a5e507dd7b86c2e1ae320.png','created_at' => '2017-05-23 07:56:46','updated_at' => '2017-05-24 12:16:03'),
            array('id' => '7','src' => 'image/bf928c939efa6345d2ef0cc9660bdce4.png','created_at' => '2017-05-23 07:56:46','updated_at' => '2017-05-24 12:16:03'),
            array('id' => '9','src' => 'image/8863b86944df02af46a983f97139382b.png','created_at' => '2017-05-23 09:20:18','updated_at' => '2017-05-24 12:16:03'),
            array('id' => '10','src' => 'image/dPmXXq57aLs.jpg','created_at' => '2017-05-23 09:59:02','updated_at' => '2017-05-24 12:16:03'),
            array('id' => '15','src' => 'image/a62dac94c375d2ff2de2dac52f6c33a8.jpeg','created_at' => '2017-05-24 13:23:17','updated_at' => '2017-05-24 13:23:17'),
            array('id' => '16','src' => 'image/f50ffedb07e04b75cc6644c643477805.jpeg','created_at' => '2017-05-24 13:23:17','updated_at' => '2017-05-24 13:23:17'),
            array('id' => '17','src' => 'image/0921d5015b7d454240c812506b3af250.png','created_at' => '2017-05-24 13:23:17','updated_at' => '2017-05-24 13:23:17'),
            array('id' => '18','src' => 'image/c96d4e137e40e4f105c97f6989a9a948.jpeg','created_at' => '2017-05-24 13:23:55','updated_at' => '2017-05-24 13:23:55'),
            array('id' => '19','src' => 'image/d6cffe14f42df60f2965abaa4f30f915.png','created_at' => '2017-05-24 13:23:55','updated_at' => '2017-05-24 13:23:55'),
            array('id' => '20','src' => 'image/68d321880cf3c9d9467fca0a33fe131c.png','created_at' => '2017-05-24 13:28:46','updated_at' => '2017-05-24 13:28:46'),
            array('id' => '21','src' => 'image/9a02de6bace26a24cb82f52f80d54a17.svg','created_at' => '2017-05-24 13:28:46','updated_at' => '2017-05-24 13:28:46'),
            array('id' => '22','src' => 'image/1862ee7a040270861f7eee037e7059be.png','created_at' => '2017-05-24 13:28:46','updated_at' => '2017-05-24 13:28:46'),
            array('id' => '23','src' => 'image/5601d10e7503d042db4ecd4c52a6fdc0.jpeg','created_at' => '2017-05-24 13:28:46','updated_at' => '2017-05-24 13:28:46'),
            array('id' => '24','src' => 'image/03974b7b10d129403dcca9c05729b8d6.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '25','src' => 'image/4acc8315f09cc72845b5260c948bb023.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '26','src' => 'image/aac08ea099e09f07354551a1678ece71.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '27','src' => 'image/bab5cc3f7f645dfd3030ce19f0fdf24f.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '28','src' => 'image/6dc9662aa31330f92cbf537f64c25f8b.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '29','src' => 'image/66ccd17163ad4fc5f127477bd81d7a8a.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '30','src' => 'image/effa2fca5bcfce79ac21b18da9d09c3e.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '31','src' => 'image/7bb6bf66d84c6c94541005e4a5a9a100.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '32','src' => 'image/1fcb8baee065f1b4be46531914cdf375.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '33','src' => 'image/8ca3fe0d11fd770d3e661c7cd682c911.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '34','src' => 'image/d52d5a6ab7d6c646b5e7adc340306d39.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '35','src' => 'image/ce8c3d2d3476a49ad9f50ac86d159a16.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '36','src' => 'image/6e306a63be490a7e8db8d2e70b33aa91.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '37','src' => 'image/ad791844e5e47629b63bd710b583d6c2.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '38','src' => 'image/6ac90c100dfa5ad4e738e5140e89e777.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '39','src' => 'image/cdcb70e60fec8cfdb46e4be93a3cc2b6.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '40','src' => 'image/f128a8e3bc86afdbfaf6e67a93218c20.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '41','src' => 'image/8d3568c9914ec588003ea0505a529ec8.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '42','src' => 'image/9ec39e109f01ce0b3a6634b28eacc118.jpeg','created_at' => '2017-05-25 11:05:56','updated_at' => '2017-05-25 11:05:56'),
            array('id' => '43','src' => 'image/ef91a2748aee0a620120bc7f5f613508.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '44','src' => 'image/805527c0efc496cf80990427250e46e5.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '45','src' => 'image/e3bf4aa27fe4d749961e80a403e656b4.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '46','src' => 'image/f42b5b25776bd6205bc37996c18c874f.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '47','src' => 'image/48de4e335eadf7855ec5676471753814.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '48','src' => 'image/24d9270ce6d7ec24971b5ee940cdc7d9.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '49','src' => 'image/4ddbc44bdf1e203e4dba909297540824.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '50','src' => 'image/de478010369a0e102db62dfc001dfec3.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '51','src' => 'image/8ec02f063b73bc82653e890d171be2d2.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '52','src' => 'image/f77fb47c400f32178c34afcc5f2c50dc.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '53','src' => 'image/0e67b4a5e2b5797cdae8aae5f37d2589.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '54','src' => 'image/06aac87900c875c384b151711dc6cf9a.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '55','src' => 'image/17f2ac7c00b074d3016f6dcc22ac007a.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '56','src' => 'image/a250366fb8901af9bbffba9ff362c89b.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '57','src' => 'image/37c0135be373575017ef5c7ac1a96628.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '58','src' => 'image/adeebe703610e18448ac0923ccbc8f7e.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '59','src' => 'image/cd7988fc512477dd966990553231431a.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '60','src' => 'image/0dd3f6abf84bd3d2c310ee0b976c765d.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '61','src' => 'image/860f9f855f685d64134d6aaaffb525f9.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '62','src' => 'image/a9fa0d26b0f7dd272ddbf0626e52a028.jpeg','created_at' => '2017-05-25 11:07:02','updated_at' => '2017-05-25 11:07:02'),
            array('id' => '63','src' => 'image/088fa1e946ded741b9f6178d35b0e0d7.jpeg','created_at' => '2017-05-25 11:08:53','updated_at' => '2017-05-25 11:08:53'),
            array('id' => '64','src' => 'image/13ab371ea360765a6326e4db3bb320fc.jpeg','created_at' => '2017-05-25 11:08:53','updated_at' => '2017-05-25 11:08:53'),
            array('id' => '65','src' => 'image/c39bbc20d2612eb86d5259d734d60fc0.jpeg','created_at' => '2017-05-25 11:08:53','updated_at' => '2017-05-25 11:08:53'),
            array('id' => '66','src' => 'image/c779a37b9fb05cd61f798d9ed662b9fd.jpeg','created_at' => '2017-05-25 11:08:53','updated_at' => '2017-05-25 11:08:53'),
            array('id' => '67','src' => 'image/cf9bc65cf4e063ded6614c1af9517984.jpeg','created_at' => '2017-05-25 11:08:53','updated_at' => '2017-05-25 11:08:53'),
            array('id' => '68','src' => 'image/5eb8afc723162fc4413dccf4bce5dd46.jpeg','created_at' => '2017-05-25 11:08:53','updated_at' => '2017-05-25 11:08:53'),
            array('id' => '69','src' => 'image/6b26a4f11f8593599f204345ae6692ba.jpeg','created_at' => '2017-05-25 11:08:53','updated_at' => '2017-05-25 11:08:53'),
            array('id' => '70','src' => 'image/e37ab95af8f8a9bca98ce6a0408ed946.jpeg','created_at' => '2017-05-25 11:08:53','updated_at' => '2017-05-25 11:08:53'),
            array('id' => '71','src' => 'image/10fb14dc133abf9d3ed6581958f689d7.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '72','src' => 'image/4a963606d6a0a361638f5d58ff0d6552.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '73','src' => 'image/6b0d5749605d1163610cb2b7d9b784c4.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '74','src' => 'image/384db86c561b499f5f8eaa575649bcdd.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '75','src' => 'image/4cdbd7ba989046e74ce9a9ded3b7330c.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '76','src' => 'image/dc3ebf777570d31e70d160ccf53e54eb.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '77','src' => 'image/8aeccb576832b75fda250bedc2b2580b.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '78','src' => 'image/d0f696a7097e2a00da90bf53b4c74213.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '79','src' => 'image/a6f62bb3792c707d20deab5ad5ece410.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '80','src' => 'image/99d94f09496e5ec751587e132197dba4.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '81','src' => 'image/19f283f1f8eb490fc272024165a8f10e.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '82','src' => 'image/c1446281f78b9344cdf1ca414224560b.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '83','src' => 'image/8691dab17f2cd2c448fbe582860ed2b7.jpeg','created_at' => '2017-05-25 11:09:21','updated_at' => '2017-05-25 11:09:21'),
            array('id' => '84','src' => 'image/b396e24b0e99102442159775fc6d1b36.png','created_at' => '2017-05-25 12:16:05','updated_at' => '2017-05-25 12:16:05'),
            array('id' => '85','src' => 'image/251fcd17e3339ae7409da88dbd060c39.jpeg','created_at' => '2017-05-25 12:16:20','updated_at' => '2017-05-25 12:16:20'),
            array('id' => '86','src' => 'image/97e584de547d42b95953f6779387832f.jpeg','created_at' => '2017-05-25 12:16:31','updated_at' => '2017-05-25 12:16:31'),
            array('id' => '87','src' => 'image/b93d25d050a020deb0f524d87f279818.jpeg','created_at' => '2017-05-25 12:16:45','updated_at' => '2017-05-25 12:16:45'),
            array('id' => '88','src' => 'image/c775f2d2f9e2f15008f5bfef06fbf2c0.jpeg','created_at' => '2017-05-25 12:17:03','updated_at' => '2017-05-25 12:17:03'),
            array('id' => '89','src' => 'image/e3be0636f10f6c21eb7b7016949f83c4.png','created_at' => '2017-05-25 12:19:16','updated_at' => '2017-05-25 12:19:16'),
            array('id' => '90','src' => 'image/2e379f3dd321be0d124a18c947eca32c.png','created_at' => '2017-05-25 12:20:47','updated_at' => '2017-05-25 12:20:47'),
            array('id' => '91','src' => 'image/b5eb185b97de5966308da437f42348ef.jpeg','created_at' => '2017-05-25 12:36:54','updated_at' => '2017-05-25 12:36:54'),
            array('id' => '92','src' => 'image/6669451d3e3d1b3d33fc7a44b5872622.jpeg','created_at' => '2017-05-25 12:37:11','updated_at' => '2017-05-25 12:37:11'),
            array('id' => '93','src' => 'image/3d0fbf4d4b691557c1947d563880e055.jpeg','created_at' => '2017-05-25 12:38:55','updated_at' => '2017-05-25 12:38:55'),
            array('id' => '94','src' => 'image/5c0941f6c230cb333d1eb66a73f01cd6.jpeg','created_at' => '2017-05-25 12:39:08','updated_at' => '2017-05-25 12:39:08'),
            array('id' => '95','src' => 'image/8d02e8ecd54a40880da166e0d6c52d83.jpeg','created_at' => '2017-05-25 12:39:25','updated_at' => '2017-05-25 12:39:25'),
            array('id' => '96','src' => 'image/44c8596f0ce1b11eb25ffff1d4dc7aa0.jpeg','created_at' => '2017-05-25 12:39:38','updated_at' => '2017-05-25 12:39:38')
        );

        $this->seed('images', $images);

        /* `sot1`.`links` */
        $links = array(
            array('id' => '1','title' => 'добавить ссылку','url' => 'http://sot.deimos/cp/links/create','active' => '1','created_at' => '2017-05-23 10:55:34','updated_at' => '2017-05-23 10:55:34'),
            array('id' => '2','title' => 'pma','url' => 'http://pma.local/tbl_structure.php?db=sot&table=links','active' => '1','created_at' => '2017-05-23 10:56:08','updated_at' => '2017-05-23 10:56:08'),
            array('id' => '3','title' => 'http://sot.deimos/cp/links/create','url' => 'http://sot.deimos/cp/links/create','active' => '1','created_at' => '2017-05-25 11:12:53','updated_at' => '2017-05-25 11:12:53'),
            array('id' => '4','title' => 'http://sot.deimos/cp/links/create','url' => 'http://sot.deimos/cp/links/create','active' => '1','created_at' => '2017-05-25 11:12:58','updated_at' => '2017-05-25 11:12:58'),
            array('id' => '5','title' => 'http://sot.deimos/cp/links/edit','url' => 'http://sot.deimos/cp/links/edit','active' => '1','created_at' => '2017-05-25 11:13:06','updated_at' => '2017-05-25 11:13:06'),
            array('id' => '6','title' => 'http://sot.deimos/cp/links/edit','url' => 'http://sot.deimos/cp/links/edit','active' => '1','created_at' => '2017-05-25 11:13:11','updated_at' => '2017-05-25 11:13:11'),
            array('id' => '7','title' => 'test','url' => 'http://sot.deimos/cp/links/edit','active' => '1','created_at' => '2017-05-25 11:13:20','updated_at' => '2017-05-25 11:13:20')
        );

        $this->seed('links', $links);

        /* `sot1`.`news` */
        $news = array(
            array('id' => '1','title' => 'Используем Cake для сборки C# кода','description' => 'Cake — это кроссплатформенная система сборки, использующая DSL с синтаксисом C# для того, что осуществлять в процессе сборки такие вещи, как сборка бинарников из исходных кодов, копирование файлов, создание/очищение/удаление папок, архивация артефактов, упаковка nuget-пакетов, прогоны юнит-тестов и многое другое. Так же Cake имеет развитую систему аддонов (просто C# классы, зачастую упакованные в nuget). Стоит отметить, что большое количество полезных функций уже встроены в Cake, а еще больше, практически на все случаи жизни, написаны сообществом и довольно успешно распространяются.','content' => '<h1>Итак, что такое Cake?</h1>

<p>&nbsp;</p>

<p>Cake &mdash; это кроссплатформенная система сборки, использующая DSL с синтаксисом C# для того, что осуществлять в процессе сборки такие вещи, как сборка бинарников из исходных кодов, копирование файлов, создание/очищение/удаление папок, архивация артефактов, упаковка nuget-пакетов, прогоны юнит-тестов и многое другое. Так же Cake имеет развитую систему аддонов (просто C# классы, зачастую упакованные в nuget). Стоит отметить, что большое количество полезных функций уже встроены в Cake, а еще больше, практически на все случаи жизни, написаны сообществом и довольно успешно распространяются.</p>

<p><a name="habracut"></a></p>

<p>Сake использует модель программирования называемую&nbsp;<em>dependency based programming</em>, аналогично другим подобным системам вроде&nbsp;<em>Rake</em>&nbsp;или&nbsp;<em>Fake</em>. Суть этой модели в том, что мы для исполнения нашей программы мы определяем задачи и зависимости между ними. Подробнее про данную модель можно почитать у&nbsp;<a href="https://martinfowler.com/articles/rake.html#DependencyBasedProgramming">Мартина Фаулера</a>.</p>

<p>&nbsp;</p>

<p>Подобная модель заставляет нас представлять наш процесс сборки как некоторые задачи (Task) и зависимости между ними. При этом логически исполнение идет в обратном порядке: мы указываем задачу, которую хотим выполнить и ее зависимости, Cake же определяет, какие задачи могут быть выполнены (для них разрешены или отсутствуют зависимости) и исполняет их.</p>

<p>&nbsp;</p>

<p><img alt="dependency based programming example" src="https://habrastorage.org/web/92f/7d0/9af/92f7d09afa674ed2a5944341b7287b97.png" /></p>

<p>&nbsp;</p>

<p>Так, например, мы хотим исполнить A, однако она зависит от B и C, а B зависит от D. Таким образом Cake исполнит их в следующем порядке:</p>

<p>&nbsp;</p>

<ol>
	<li>С или D</li>
	<li>B</li>
	<li>A</li>
</ol>

<p>&nbsp;</p>

<p>Задача же (Task) в Cake обычно представляет собой законченный кусок работы по сборке/тестированию/упаковке. Объявляется следующим образом</p>

<p>&nbsp;</p>

<pre>
<code>Task(&quot;A&quot;) // Название
.Does(() =&gt;
{
    //Реализация Task A
});</code></pre>

<p>&nbsp;</p>

<p>Указать же, что задача A зависима от, например, задачи B можно с помощью метода&nbsp;<em>IsDependentOn</em>:</p>

<p>&nbsp;</p>

<pre>
<code>Task(&quot;A&quot;) // Название
.IsDependentOn(&quot;B&quot;)
.Does(() =&gt;
{
    //Реализация Task A
});</code></pre>

<p>&nbsp;</p>

<p>Также можно легко задавать условия, при которых задача будет или не будет выполняться с помощью метода&nbsp;<em>WithCriteria</em>:</p>

<p>&nbsp;</p>

<pre>
<code>Task(&quot;B&quot;) // Название
.IsDependentOn(&quot;C&quot;)
.WithCriteria(DateTime.Now.Second % 2 == 0)
.Does(() =&gt;
{
    //Реализация Task A
});</code></pre>

<p>&nbsp;</p>

<p>Если же какая-то задача зависит от задачи B, а критерий принимает значение false, то задача B не выполнится, однако поток исполнения пойдет дальше и исполнит задачи, от которых зависит B.<br />
Существует также перегрузка метода&nbsp;<em>WithCriteria</em>, принимающая в качестве параметра функцию, которая возвращает bool. В этом случае выражение будет посчитано только тогда, когда до задачи дойдет очередь, а не в момент выстраивания дерева задач.</p>

<p>&nbsp;</p>

<p>Cake также поддерживает некоторые специфичные препроцессорные директивы, среди которых&nbsp;<em>load</em>,&nbsp;<em>reference</em>,&nbsp;<em>tool</em>&nbsp;и&nbsp;<em>break</em>. Подбробнее о них можно почитать на соответствующей&nbsp;<a href="http://cakebuild.net/docs/fundamentals/preprocessor-directives">странице</a>&nbsp;документации.</p>

<p>&nbsp;</p>

<p>Думаю, что людей, которые собирают свои проекты руками в эру DevOps, уже не так уж много. Преимущество любой системы сборки в сравнении с ручной сборкой очевидно &mdash; автоматически настроенный процесс всегда лучше ручных манипуляций.</p>

<p>&nbsp;</p>

<h2>Преимущества Cake при разработке на C</h2>

<p>&nbsp;</p>

<p>Зачем использовать именно Cake, раз существует множество альтернатив? Если вы не разрабатываете на C#, то, скорее всего, не за чем. А если разрабатываете, то выглядит разумным писать скрипты сборки на тем же языке, на котором написан и основной проект, поскольку не нужно изучать еще один язык программирования и плодить их зоопарк в рамках одной кодовой базы. Потому и стали появляться системы сборки типа&nbsp;<em>Rake (Ruby)</em>,&nbsp;<em>Psake (Powershell)</em>&nbsp;или&nbsp;<em>Fake (F#)</em>.</p>

<p>&nbsp;</p>

<p>Cake &mdash; безусловно не единственный способ собрать проект на C#. Как варианты, можно привести в пример чистый MSBuild, Powershell, Bat-скрипты или CI Server типа Teamcity или Jenkins, однако все они имеют как преимущества, так и недостатки:</p>

<p>&nbsp;</p>

<ul>
	<li>Скрипты на Powershell, равно как Bat/Bash довольно сложно поддерживать</li>
	<li>DSL на основе C# приятнее по синтаксису DSL на основе XML из MSBuild. К тому же поддержка MSBuild в Linux/Mac появилась не так давно.</li>
	<li>CI-сервер накладывает Vendor-lock и зачастую требует &quot;программирования мышкой&quot;, следовательно и отвязывает версию процесса сборки от версии кода в репозитории, хотя некоторые CI системы и позволяют хранить файлы с описанием процесса сборки вместе с кодом.</li>
	<li>Использование CI не позволяет собирать код локально так же, как и на CI-сервере</li>
</ul>

<p>&nbsp;</p>

<h1>Установка Cake</h1>

<p>&nbsp;</p>

<p>Теперь поговорим о том, как же исполнять скрипты с задачами. У cake есть загрузчик, который все сделает за вас. Скачать его можно либо вручную, либо следующей powershell командой:</p>

<p>&nbsp;</p>

<pre>
<code>Invoke-WebRequest http://cakebuild.net/download/bootstrapper/windows -OutFile build.ps1</code></pre>

<p>&nbsp;</p>

<p>Скачанный файл&nbsp;<em>build.ps1</em>&nbsp;затем сам загрузит необходимый cake.exe, если он еще не загружен, и исполнит cake-скрипт (по-умолчанию это&nbsp;<em>build.cake</em>), если мы вызовем его следующей командой:</p>

<p>&nbsp;</p>

<pre>
<code>Powershell -File &quot;.\\build.ps1&quot; -Configuration &quot;Debug&quot;</code></pre>

<p>&nbsp;</p>

<p>Мы можем также передать в&nbsp;<em>build.ps1</em>&nbsp;аргументы командной строки, которые потом исполнятся. Они могут быть как встроенными, например,&nbsp;<em>configuration</em>, который обычно отвечает за конфигурацию сборки, так и заданные самостоятельно &mdash; в этом случае есть два способа:</p>

<p>&nbsp;</p>

<ul>
	<li>Передать как значение параметра&nbsp;<em>ScriptArgs</em>:

	<pre>
<code>Powershell -File &quot;.\\build.ps1&quot; -Script &quot;version.cake&quot; -ScriptArgs &#39;--buildNumber=&quot;123&quot;&#39;</code></pre>
	</li>
	<li>Изменить build.ps1 таким образом, чтобы он пробрасывал переданный аргумент cake.exe.</li>
</ul>

<p>&nbsp;</p>

<h1>Примеры</h1>

<p>&nbsp;</p>

<p>Что же, теперь перейдем к практике. Легко можно представить типичный цикл сборки nuget-пакета:</p>

<p>&nbsp;</p>

<p><img alt="nuget pack pipeline" src="https://habrastorage.org/web/823/90e/7df/82390e7df95342f8bcf0798e2f5ab595.png" /></p>

<p>&nbsp;</p>

<ul>
	<li>Собираем с помощью MSBuild из исходников dll</li>
	<li>Прогоняем юнит-тесты</li>
	<li>Собираем все в nuget по nuspec-описанию</li>
	<li>Пушим в nuget feed</li>
</ul>

<p>&nbsp;</p>

<h3>Сборка dll</h3>

<p>&nbsp;</p>

<p>Чтобы собрать из исходников наш solution, необходимо сделать 2 вещи:</p>

<p>&nbsp;</p>

<ul>
	<li>Восстановить nuget-пакеты, от которых зависит наш solution с помощью функциии&nbsp;<em>NuGetRestore</em></li>
	<li>Собрать solution по умолчанию встроенной в cake функцией&nbsp;<em>DotNetBuild</em>, передав ей параметр&nbsp;<em>configuration</em>.</li>
</ul>

<p>&nbsp;</p>

<p>Опишем задачу по сборке solution на cake-dsl:</p>

<p>&nbsp;</p>

<pre>
<code>var configuration = Argument(&quot;configuration&quot;, &quot;Debug&quot;);

Task(&quot;Build&quot;)
.Does(() =&gt;
{
    NuGetRestore(&quot;../Solution/Solution.sln&quot;);
    DotNetBuild(&quot;../Solution/Solution.sln&quot;, x =&gt; x
        .SetConfiguration(configuration)
        .SetVerbosity(Verbosity.Minimal)
        .WithTarget(&quot;build&quot;)
        .WithProperty(&quot;TreatWarningsAsErrors&quot;, &quot;false&quot;)
    );
});

RunTarget(&quot;Build&quot;);</code></pre>

<p>&nbsp;</p>

<p>Конфигурация сборки, соответственно, считывается из аргументов командой строки с помощью функции&nbsp;<em>Argument</em>&nbsp;со значением по умолчанию &quot;Debug&quot;. Функция&nbsp;<em>RunTarget</em>&nbsp;запускает указанную задачу, так что мы сразу можем проверить правильность работы нашего cake-скрипта.</p>

<p>&nbsp;</p>

<h2>Юнит-тесты</h2>

<p>&nbsp;</p>

<p>Чтобы запустить юнит-тесты, совместимые с nunit v3.x, нам нужна функция&nbsp;<em>NUnit3</em>, которая не входит в поставку Cake и поэтому требует подключения через препроцессорную директиву #tool. Директива #tool позволяет подключать инструменты из nuget-пакетов, чем мы и воспользуемся:</p>

<p>&nbsp;</p>

<pre>
<code>#tool &quot;nuget:?package=NUnit.ConsoleRunner&amp;version=3.6.0&quot;</code></pre>

<p>&nbsp;</p>

<p>При этом сама задача оказывается предельно проста. Не забываем, конечно, что она зависит от задачи Build:</p>

<p>&nbsp;</p>

<pre>
<code>#tool &quot;nuget:?package=NUnit.ConsoleRunner&amp;version=3.6.0&quot;

Task(&quot;Tests::Unit&quot;)
.IsDependentOn(&quot;Build&quot;)
.Does(()=&gt; 
{
    NUnit3(@&quot;..\\Solution\\MyProject.Tests\\bin\\&quot; + configuration + @&quot;\\MyProject.Tests.dll&quot;);
});

RunTarget(&quot;Tests::Unit&quot;);</code></pre>

<p>&nbsp;</p>

<h2>Пакуем все в nuget</h2>

<p>&nbsp;</p>

<p>Чтобы упаковать нашу сборку в nuget, воспользуемся следующей nuget-спецификацией:</p>

<p>&nbsp;</p>

<pre>
<code><!--?xml version="1.0" encoding="utf-8"?-->

    
        Solution
        1.0.0Test solution for demonstration purposes
        
            Test solution for demonstration purposes
        
        Gleb Smagliy
        Gleb Smagliy
        false
        
        
            
        
    
    
        
        
    
</code></pre>

<p>&nbsp;</p>

<p>Положим ее в папку со скриптом build.cake. При исполнении задачи Pack перенесем все необходимые артефакты для упаковки в папку &quot;..\\.artefacts&quot;. Для этого убедимся, что она есть (а если нет &mdash; создадим) с помощью функции&nbsp;<em>EnsureDirectoryExists</em>&nbsp;и очистим ее с помощью функции&nbsp;<em>CleanDirectory</em>, встроенных в Cake. С помощью же функций по копированию файлов переместим нужные нам dll и pdb в папку с арефактами.</p>

<p>&nbsp;</p>

<p>По умолчанию собранный nupkg попадет в текущую папку, поэтому укажем в качестве&nbsp;<em>OutputDirectory</em>&nbsp;папку &quot;..\\package&quot;, которую мы так же создали и очистили.</p>

<p>&nbsp;</p>

<pre>
<code>Task(&quot;Pack&quot;)
.IsDependentOn(&quot;Tests::Unit&quot;)
.Does(()=&gt; 
{
    var packageDir = @&quot;..\\package&quot;;
    var artefactsDir = @&quot;..\\.artefacts&quot;;

    MoveFiles(&quot;*.nupkg&quot;, packageDir);

    EnsureDirectoryExists(packageDir);
    CleanDirectory(packageDir);

    EnsureDirectoryExists(artefactsDir);
    CleanDirectory(artefactsDir);
    CopyFiles(@&quot;..\\Solution\\MyProject\\bin\\&quot; + configuration + @&quot;\\*.dll&quot;, artefactsDir);
    CopyFiles(@&quot;..\\Solution\\MyProject\\bin\\&quot; + configuration + @&quot;\\*.pdb&quot;, artefactsDir);
    CopyFileToDirectory(@&quot;.\\Solution.nuspec&quot;, artefactsDir);

    NuGetPack(new FilePath(artefactsDir + @&quot;\\Solution.nuspec&quot;), new NuGetPackSettings
    {
        OutputDirectory = packageDir
    });
});

RunTarget(&quot;Pack&quot;);</code></pre>

<p>&nbsp;</p>

<h2>Публикуем</h2>

<p>&nbsp;</p>

<p>Для публикации пакетов используется функция&nbsp;<em>NuGetPush</em>, которая принимает путь до nupkg файла, а также настройки: ссылку на nuget feed и API key. Конечно же, мы не будем хранить API Key в репозитории, а передадим снаружи опять же с помощью функции&nbsp;<em>Argument</em>. В качестве же nupkg возьмем просто первый файл в директории&nbsp;<em>package</em>, подходящий по маске с помощью&nbsp;<em>GetFiles</em>. Мы можем так сделать, поскольку директория была предварительно очищена перед упаковкой. Итак, задача по публикации описывается следующим dsl:</p>

<p>&nbsp;</p>

<pre>
<code>var nugetApiKey = Argument(&quot;NugetApiKey&quot;, &quot;&quot;);

Task(&quot;Publish&quot;)
.IsDependentOn(&quot;Pack&quot;)
.Does(()=&gt; 
{
    NuGetPush(GetFiles(@&quot;..\\package\\*.nupkg&quot;).First(), new NuGetPushSettings {
        Source = &quot;https://www.nuget.org/api/v2&quot;,
        ApiKey = nugetApiKey
    });
});

RunTarget(&quot;Publish&quot;);</code></pre>

<p>&nbsp;</p>

<h2>Упрощаем себе жизнь</h2>

<p>&nbsp;</p>

<p>Во время отладки cake-скрипта, да и просто для отладки nuget-пакета, можно не публиковать его каждый раз в удаленный feed. Тут-то нам на помощью и придет функция&nbsp;<em>WithCriteria</em>, которую мы рассматривали. Будем передавать скрипту параметром флаг&nbsp;<em>PublishRemotely</em>&nbsp;(по-умолчанию выставленный в false), чтобы по значению этого флага определять, выложить ли пакет в удаленный feed. Однако cake не выполнит скрипт, если мы пропустим задачу, которую указали функции&nbsp;<em>RunTarget</em>. Поэтому заведем фиктивную пустую задачу&nbsp;<em>BuildAndPublish</em>, которая будет зависеть от&nbsp;<em>Publish</em>:</p>

<p>&nbsp;</p>

<pre>
<code>Task(&quot;BuildAndPublish&quot;)
.IsDependentOn(&quot;Publish&quot;)
.Does(()=&gt; 
{
});

RunTarget(&quot;BuildAndPublish&quot;);</code></pre>

<p>&nbsp;</p>

<p>И добавим условие к задаче Publish:</p>

<p>&nbsp;</p>

<pre>
<code>var nugetApiKey = Argument(&quot;NugetApiKey&quot;, &quot;&quot;);
var publishRemotely = Argument(&quot;PublishRemotely&quot;, false);

Task(&quot;Publish&quot;)
.IsDependentOn(&quot;Pack&quot;)
.WithCriteria(publishRemotely)
.Does(()=&gt; 
{
    NuGetPush(GetFiles(@&quot;..\\package\\*.nupkg&quot;).First(), new NuGetPushSettings {
        Source = &quot;https://www.nuget.org/api/v2&quot;,
        ApiKey = nugetApiKey
    });
});</code></pre>

<p>&nbsp;</p>

<p>Скрипт для сборки и публикации nuget-пакета почти готов, осталось только совместить все задачи воедино. Окончательную версию кода можно найти в репозитории на&nbsp;<a href="https://github.com/gleb-smagliy/cake-build-article">github</a>.</p>

<h1>Заключение</h1>

<p>Мы рассмотрели простейший пример использования cake. Сюда можно было бы добавить интеграцию со slack, мониторинг покрытия кода тестами и еще много всего. Имея богатую систему аддонов, активное сообщество, а также довольно неплохую документацию, cake явлляется весьма неплохой альтернативой CI-системам и MSBuild для сборки С# кода.</p>','image_id' => '90','category_id' => '2','active' => '1','created_at' => '2017-05-22 06:25:22','updated_at' => '2017-05-25 12:20:47'),
            array('id' => '2','title' => 'Как быстро настроить автопостинг для Facebook и Twitter','description' => 'Здравствуйте, дорогие читатели!

Потребность максимально быстро и эффективно выполнять работу с сайтом есть у всех, как у успешных, так и у начинающих предпринимателей. Желание автоматизировать процесс выражается не только в лёгком наполнении сайта контентом, но и в наиболее быстром информировании целевой аудитории о появлении нового контента.','content' => '<p>Здравствуйте, дорогие читатели!<br /><br />
Потребность максимально быстро и эффективно выполнять работу с сайтом есть у всех, как у успешных, так и у начинающих предпринимателей. Желание автоматизировать процесс выражается не только в лёгком наполнении сайта контентом, но и в наиболее быстром информировании целевой аудитории о появлении нового контента.<br /><br />
В этой статье я хочу продемонстрировать вам простой способ постинга информации (например, статей или страниц сайта) в социальные сети с минимальным количеством усилий. Представьте себе, что вы добавляете контент на сайт, или же пользователи вашего сайта публикуют объявления (подобно тому, как это было выполнено нашей командой в работе над сайтом <a href="https://carvoy.com/">carvoy.com</a>), и информация о добавлении нового контента появляется на ваших страницах в социальных сетях. Этот способ эффективен тем, что доносит информацию непосредственно целевой аудитории.<br />
 </p>

<h2>Автопостинг в Facebook</h2>

<p><br />
Предлагаю начать с практической части данного процесса. Сначала разберемся с автопостингом в Facebook при добавлении объявления. Согласно документации для Facebook, нам необходимо зарегистрировать приложение, чтобы использовать его для публикации сообщений на стене. Переходим на специальную страницу для разработчиков <a href="https://developers.facebook.com/apps">https://developers.facebook.com/apps</a> и добавляем Facebook приложение.<br /><br /><img alt="2999b5220fa84a2388733342fc5c3fd0.png" src="https://habrastorage.org/web/299/9b5/220/2999b5220fa84a2388733342fc5c3fd0.png" /><br /><br />
Тут все предельно просто: нажимаем кнопку ”Create a New App”, вводим информацию о вашем приложении (название, контактный email, выбираем категорию “Apps for Pages”) и, наконец, после клика на кнопку “Create App ID” и ввода проверочной капчи создается приложение.<br /><br /><img alt="9035c808640045ce990be20b7eca9812.png" src="https://habrastorage.org/web/903/5c8/086/9035c808640045ce990be20b7eca9812.png" /><br /><br />
Для дальнейшей работы вам понадобятся следующие параметры: <br />
APP ID и APP SECRET<br /><br /><img alt="0b7a9918fcc649299710736ea65a3757.png" src="https://habrastorage.org/web/0b7/a99/18f/0b7a9918fcc649299710736ea65a3757.png" /><br /><br />
С этими данными нам необходимо получить токен доступа для этого приложения, который позволит нам действовать от имени администратора страницы. Этот токен в дальнейшем будет использоваться для публикации. Как получить access token детально описано в документации <a href="https://developers.facebook.com/docs/facebook-login/access-tokens#apptokens">facebook for developers</a>. Все что нам нужно, это открыть следующую ссылку в браузере:<br /><br /><code>https://graph.facebook.com/oauth/access_token?type=client_cred&amp;client_id=&amp;client_secret=</code><br /><br />
Этот запрос вернет токен доступа, который мы можем использовать для публикации. Далее устанавливаем разрешение на публикацию следующим запросом:<br /><br /><code>https://www.facebook.com/dialog/oauth?client_id=&amp;client_secret=&amp;redirect_uri=https://carvoy.com&amp;scope=publish_actions&amp;response_type=token</code><br /><br />
Чтобы опубликовать на стене вашей социальной страницы в Facebook, нам нужно будет отправить HTTP-запрос POST на следующий URL-адрес:<br /><code>https://graph.facebook.com//feed</code><br /><br />
Далее нам надо предоставить сообщение, ссылку на картинку, ссылку на страницу объявления, которое только что добавили, заголовок, описание, не забывая отправить наш параметр токена доступа, который мы только что получили.<br /><br />
Чтобы узнать PAGE_ID страницы, на стену которой вы собираетесь публиковать запись, достаточно изменить в полном адресе страницы www на graph и добавить get параметром токен доступа. Вот, к примеру, ссылка для получения ID нужной мне страницы.<br /><br /><code>https://graph.facebook.com/Carvoy/?access_token=326799827727254|aRtZuU48IqeJ0s8SY6sVOIfPAiA</code><br /><br />
В ответ мы получаем JSON объект, в котором содержится ID этой страницы. Вот так:<br />
 </p>

<pre>
<code>{
   "name": "Carvoy",
   "id": "1629966630552080"
}</code></pre>

<p><br />
Автопостинг реализуется в виде модуля autoposting, в котором создается класс поведения. Его я буду применять в модели Lease и затем обрабатывать событие при добавлении объявления (листинга). Затем этот модуль можно будет переиспользовать, дополнять и дорабатывать.<br /><br />
Структура файлов модуля:<br />
 </p>

<pre>
<code>…
autoposting
-- behaviors
-- -- AutopostingBehavior.php
-- Module.php
…</code></pre>

<p><br />
В файле modules/autoposting/Module.php — стандартная инициализация модуля. А в файле modules/autoposting/behaviors/AutopostingBehavior.php — описание поведения при добавлении новой записи:<br />
 </p>

<pre>
<code> \'postToWall\',
        ];
    }

    /**
     * @param \\yii\\base\\Event $event
     *
     * @throws Exception
     */
   public function postToWall( $event ) {

        $model    = $event-&gt;sender;

        if ($model) {
            $link = Url::to([\'/lease/lease/view\', \'state\'=&gt;$model-&gt;state, \'node\'=&gt;$model-&gt;url ], true);
            $message = "New listing available on our site - $model-&gt;make $model-&gt;model $model-&gt;year in $model-&gt;location. \\n" . $link;
            $this-&gt;facebookPost([
                \'message\'     =&gt; $message,
                \'link\'        =&gt; $link,
                // \'picture\'     =&gt; \'http://thepicturetoinclude.jpg\', // link to vehicle picture
                // \'name\'        =&gt; \'Name of the picture, shown just above it\',
                // \'description\' =&gt; \'Full description explaining whether the header or the picture\'
            ]);
            $this-&gt;twitterPost($message);
        }

    }

    private function facebookPost ($data)
    {
        // need token
        $data[\'access_token\'] = \'326799827727254|aRtZuU48IqeJ0s8SY6sVOIfPAiA\';

        $page_id = ‘1629966630552080’;
        $post_url = \'https://graph.facebook.com/\'.$page_id.\'/feed\';

        // init
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $post_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // execute and close
        $return = curl_exec($ch);
        curl_close($ch);
        // end
        return $return;
    }

    private function twitterPost ($message)
    {

    }

}</code></pre>

<p><br />
Метод twitterPost я опишу немного позже, когда мы закончим с публикацией в Fecebook и перейдем к автопостингу в Twitter.<br /><br />
Добавим класс поведения автопостинга в массив с поведениями модели <br />
/modules/lease/models/frontend/Lease.php<br />
 </p>

<pre>
<code>...
   /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            \'timestampBehavior\' =&gt; [
                \'class\' =&gt; yii\\behaviors\\TimestampBehavior::className(),
            ],
            \\modules\\autoposting\\behaviors\\AutopostingBehavior::className(),  // Autoposting behavior
        ];
    }
...</code></pre>

<p><br />
Сразу добавим поведение TimestampBehavior. С его помощь заполняются поля модели created_at или updated_at во время создания или обновления записи. Теперь при создании нового листинга в классе AutopostingBehavior отработает метод postToWall, в котором будут отправляться запросы на публикацию в социальные сети. Это определено следующей строкой в классе AutopostingBehavior:<br />
 </p>

<pre>
<code>...
ActiveRecord::EVENT_AFTER_INSERT =&gt; \'postToWall\',
...</code></pre>

<p> </p>

<h2>Автопостинг в Twitter</h2>

<p><br />
Для постинга в Twitter будем использовать наиболее популярную PHP библиотеку для работы с Twitter OAuth REST API — <a href="https://twitteroauth.com/">twitteroauth</a>.<br /><br />
Установим ее с использованием composer. Нам просто нужно будет выполнить следующую команду:<br /><br /><code>php composer.phar require abraham/twitteroauth</code><br /><br />
Чтобы пользоваться Twitter API нужно тоже зарегистрировать свое приложение. Для этого идем по ссылке <a href="https://apps.twitter.com/">https://apps.twitter.com/</a> под своим логином и паролем и жмем на кнопку «Create New App». Затем заполняем форму и жмем “Create your Twitter application”.<br /><br />
Попадаем в настройки вновь созданного приложения. Здесь необходимо убедиться, что в пункте Access level выбрано “Read and write”. <br /><br />
Переходим во вкладку «Keys and Access Tokens», а потом жмем на название вновь созданного приложения. На этой вкладке мы берем 4 ключа для работы с нашим приложением:<br /><br /><code>Consumer Key<br />
Consumer Secret</code><br />
Прокручиваем страницу ниже и видим кнопку «Create my access token»; после нажатия на нее получаем недостающую пару ключей:<br /><br /><code>Access Token<br />
Access Token Secret</code><br /><br />
Дальнейшие действия очень просты. Мы реализуем метод twitterPost. Для этого нужно использовать класс TwitterOAuth с ключами для доступа к Twitter.<br />
 </p>

<pre>
<code>...
private function twitterPost ($message)
    {

        $CONSUMER_KEY    = \'XYNpO5yj0shMgH43j4lYKMDfH\';
        $CONSUMER_SECRET = \'VevyEwrhHxabcQgN2S0KuL1i9Gx9CnPXyM2yVLfQ0LlJSZ7BmF\';
        $OAUTH_TOKEN     = \'3432829204-6IS6o3hGW3xouvgCso279o4ODU15grLLUy0iWPX\';
        $OAUTH_SECRET    = \'vGzYOtJkcx8PK96YcyUdXM6PtqmhGiVLmHOqCDHM2lkIq\';


        $connection = new \\Abraham\\TwitterOAuth\\TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $OAUTH_TOKEN, $OAUTH_SECRET);

        $statues = $connection-&gt;post("statuses/update", array("status" =&gt; $message));

        return $connection-&gt;getLastHttpCode() == 200;

    }
...</code></pre>

<p><br />
Итак, буквально за несколько шагов мы организовали автопостинг в две популярные социальные сети. Естественно, код интеграции представлен в ознакомительных целях для демонстрации; его можно улучшить и выносить интеграцию с каждой социальной сетью в отдельный класс. <br /><br />
Параметры, такие как access_token и page_id для Facebook, а также Consumer Key, Consumer Secret, Access Token, Access Token Secret для Twitter можно вынести в файл конфигурации приложения в файле common\\config\\params.php.<br />
 </p>

<pre>
<code> \'admin@example.com\',
    \'supportEmail\' =&gt; \'support@example.com\',
    \'user.passwordResetTokenExpire\' =&gt; 3600,
    \'autoposting\' =&gt; [
        \'twitter\' =&gt; [
            \'consumer_key\'    =&gt; "XYNpO5yj0shMgH43j4lYKMDfH",
            \'consumer_secret\' =&gt; "VevyEwrhHxabcQgN2S0KuL1i9Gx9CnPXyM2yVLfQ0LlJSZ7BmF",
            \'oauth_token\'     =&gt; "3432829204-6IS6o3hGW3xouvgCso279o4ODU15grLLUy0iWPX",
            \'oauth_secret\'    =&gt; "vGzYOtJkcx8PK96YcyUdXM6PtqmhGiVLmHOqCDHM2lkIq",
        ],
        \'facebook\' =&gt; [
            \'page_id\' =&gt; \'1629966630552080\',
            \'page_access_token\' =&gt; \'326799827727254|aRtZuU48IqeJ0s8SY6sVOIfPAiA\'
        ]
    ]
];</code></pre>

<p><br />
Теперь получать доступ к этим параметрам можно через свойство params экземпляра приложения:<br /><br /><code>$data[\'access_token\'] = Yii::$app-&gt;params[\'autoposting\'][\'facebook\'][\'page_access_token\'];</code><br /><br />
Отмечу отдельно, что на рабочем проекте необходимо организовать очередь для отправки запросов в социальные сети, а не делать синхронные запросы на публикацию. Связано это с тем, что пользователь при публикации объявления на сайте при данном подходе будет дожидаться выполнения запросов на публикацию в социальные сети и только после их выполнения получит фидбек об удачном добавлении его объявления на сайт. Это может занять длительное время, хотя момент публикации в социальные сети не должен отрицательно отражаться на юзабилити.<br /><br />
Для организации такого рода очереди, чтобы публикация в социальные сети проходила в фоновом режиме и не увеличивала время добавления пользователем объявления на сайт, нам поможет самое лучшее, на мой взгляд, расширение для организации очередей <a href="https://github.com/zhuravljov/yii2-queue">https://github.com/zhuravljov/yii2-queue</a><br /><br />
Весь описанный в этой и <a href="https://habrahabr.ru/post/318242/">предыдущих статьях</a> код доступен для вас в <a href="https://github.com/pavelsingree/yii2-angular">репозитории</a>.<br /><br />
Спасибо за внимание!</p>','image_id' => '93','category_id' => '2','active' => '1','created_at' => '2017-05-22 12:56:21','updated_at' => '2017-05-25 12:38:55'),
            array('id' => '3','title' => 'Приглашаем на Moscow Data Science 31 мая','description' => '31 мая в офисе Mail.Ru Group состоится традиционная встреча сообщества Moscow Data Science. Вы сможете обменяться профессиональным опытом решения практических задач анализа данных и пообщаться в неформальной обстановке. В программе встречи три доклада, подробности читайте под катом.','content' => '<p>31 мая в офисе Mail.Ru Group состоится традиционная встреча сообщества Moscow Data Science. Вы сможете обменяться профессиональным опытом решения практических задач анализа данных и пообщаться в неформальной обстановке. В программе встречи три доклада, подробности читайте под катом.<br />
<a name="habracut"></a><br />
<br />
<img src="https://habrastorage.org/web/2f7/d6a/b2f/2f7d6ab2fb27421dbc6957577eef2949.jpg" style="float:left" /><strong>&mdash; &laquo;Градиентный бустинг: возможности, особенности и фишки за пределами стандартных kaggle-style задач&raquo;</strong><br />
Алексей Натекин, DM Labs, OpenDataScience<br />
<br />
Многие пользуются градиентным бустингом, но мало кто читает по нему документацию. Еще меньше людей интересуются статьями и рецептами, как его лучше готовить и что вообще с ним можно делать. Во время этого доклада мы как раз пройдемся по набору интересных возможностей, приемов и рецептов.<br />
<br />
<img src="https://habrastorage.org/web/974/7ea/c9c/9747eac9ceba45d9ba602d582c4c4a13.jpg" style="float:left" /><strong>&mdash; &laquo;Как перестать бояться и начать решать convai.io&raquo;</strong><br />
Валентин Малых, Лаборатория нейронных систем и глубокого обучения МФТИ<br />
<br />
Для тех, кто хотел поучаствовать в соревновании по созданию разговорного искусственного интеллекта, и для тех, кто хотел, но не знал об этом, будет интересным посмотреть на то, как устроен бейзлайн на convai.io. Также мы дадим обзор существующего состояния области, чтобы понимать где мы находимся, и почему это соревнование нужно провести именно сейчас.<br />
<br />
<img src="https://habrastorage.org/web/8d9/1dd/c92/8d91ddc929e34cf59f2e03b582119025.jpg" style="float:left" /><strong>&mdash; &laquo;Решение задачи Dstl Satellite Imagery Feature Detection (Kaggle)&raquo;</strong><br />
Евгений Некрасов, Mail.Ru Group<br />
<br />
В соревновании Dstl Satellite Imagery Feature Detection участникам была поставлена задача сегментации мультиспектральных спутниковых изображений. В докладе будет разобрано решение этой задачи на основе свёрточных нейронных сетей, которому присудили 7 место из 419 команд.<br />
<br />
Сбор участников и регистрация: 18:00<br />
Начало докладов: 18:30<br />
<br />
Адрес: офис компании Mail.Ru Group, Ленинградский проспект, 39, стр. 79.<br />
<br />
Для участия необходимо&nbsp;<a href="https://corp.mail.ru/ru/press/events/347/#">зарегистрироваться</a>. Для тех, кто не сможет присутствовать лично, будет организована&nbsp;<a href="https://it.mail.ru/broadcasts/67/">видеотрансляция</a>.</p>','image_id' => '94','category_id' => '2','active' => '1','created_at' => '2017-05-22 13:28:28','updated_at' => '2017-05-25 12:39:08'),
            array('id' => '4','title' => 'Lorem Ipsum','description' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.','content' => '<p><strong>Lorem Ipsum</strong> - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>','image_id' => '96','category_id' => '3','active' => '1','created_at' => '2017-05-22 13:37:28','updated_at' => '2017-05-25 12:39:38'),
            array('id' => '5','title' => 'Производительность I/O бэкэнда: Node vs. PHP vs. Java vs. Go','description' => 'Понимание модели ввода/вывода вашего приложения может привести и к пониманию различий между приложением, работающим с нагрузкой, под которой оно создавалось, и тем, которое лицом к лицу столкнулось с реальным способом своего применения. Возможно, если ваше приложение невелико и не создаёт большой нагрузки, то для него это не так важно. Но по мере роста трафика использование ошибочной модели ввода/вывода может погрузить вас в мир боли.','content' => '<p>Понимание модели ввода/вывода вашего приложения может привести и к пониманию различий между приложением, работающим с нагрузкой, под которой оно создавалось, и тем, которое лицом к лицу столкнулось с реальным способом своего применения. Возможно, если ваше приложение невелико и не создаёт большой нагрузки, то для него это не так важно. Но по мере роста трафика использование ошибочной модели ввода/вывода может погрузить вас в мир боли.</p>

<p> </p>

<p>Как и в большинстве других ситуаций с несколькими возможными решениями, дело не в том, какой из вариантов лучше, дело в понимании компромиссов. В этой статье мы сравним Node, Java, Go и PHP из-под Apache, обсудим модели ввода/вывода в разных языках, рассмотрим достоинства и недостатки каждой модели и прогоним простенькие бенчмарки. Если вас волнует производительность ввода/вывода вашего следующего веб-приложения, то эта статья для вас.</p>

<p> </p>

<h2>Основы ввода/вывода: освежим знания</h2>

<p> </p>

<p>Для понимания факторов, относящихся к вводу/выводу, сначала нужно вспомнить некоторые концепции, используемые на уровне ОС. Маловероятно, что со многими из них вам придётся иметь дело напрямую, скорее всего, вы будете работать с ними опосредованно, через runtime-окружение приложения. И подробности играют важную роль.</p>

<p> </p>

<h3>Системные вызовы</h3>

<p> </p>

<p>Возьмём сначала системные вызовы, которые можно описать так:</p>

<p> </p>

<ul><li>Ваша программа (в так называемом пользовательском пространстве) должна просить ядро операционной системы выполнить операцию ввода/вывода от имени вашей программы.</li>
	<li>Системные вызовы — это способ, с помощью которого программа просит ядро что-то сделать. Специфика их реализаций зависит от ОС, но базовый принцип везде один и тот же. Должна быть какая-то конкретная инструкция для передачи управления из вашей программы через ядро (как вызов функции, только со специальной «добавкой» для работы в такой ситуации). В целом системные вызовы блокирующие, т. е. программа ждёт, пока ядро не вернётся к вашему коду.</li>
	<li>Ядро выполняет базовую операцию ввода/вывода на нужном устройстве (диске, сетевой карте и т. д.) и отвечает системному вызову. В реальной жизни ядро может выполнять целый ряд действий после вашего запроса, включая ожидание готовности устройства, обновление его внутреннего состояния и т. д. Но вам об этом не нужно беспокоиться. Это обязанности ядра.<img alt="image" src="https://habrastorage.org/web/db8/cf5/4d4/db8cf54d418d4c8d90d1f227e44f817f.jpg" /></li>
</ul><p> </p>

<h3>Блокирующие и неблокирующие вызовы</h3>

<p> </p>

<p>Выше говорилось, что системные вызовы — блокирующие, и в целом это так. Однако некоторые вызовы можно охарактеризовать как неблокирующие. Это означает, что ядро принимает ваш запрос, кладёт его в очередь или какой-то буфер, а затем безо всякого ожидания немедленно возвращается к выполняемому в данный момент вводу/выводу. Так что «блокирование» происходит лишь на очень небольшой период времени, достаточный для постановки вашего запроса в очередь.</p>

<p> </p>

<p>Чтобы было понятнее, вот некоторые примеры (системных вызовов Linux):</p>

<p> </p>

<ul><li><code>read()</code> — блокирующий вызов: вы передаёте ему дескриптор (handle), говорящий, какой файл взять и в какой буфер доставить считываемые данные; вызов возвращается, когда данные окажутся в месте назначения. Всё просто и понятно.</li>
	<li><code>epoll_create()</code>, <code>epoll_ctl()</code> и <code>epoll_wait()</code> — вызовы, которые, соответственно, позволяют создавать группу дескрипторов для прослушивания; добавлять дескрипторы в группу / удалять их из неё; блокировать до тех пор, пока не появится активность. Это позволяет эффективно управлять большим количеством операций ввода/вывода с помощью одного потока выполнения. Хорошо, что есть такая функциональность, но её довольно сложно использовать.</li>
</ul><p> </p>

<p>Важно понимать различия в тайминге. Если ядро процессора работает на частоте 3 ГГц, без каких-либо оптимизаций, то оно выполняет 3 миллиарда тактов в секунду (3 такта в наносекунду). Для неблокирующего системного вызова могут потребоваться десятки тактов, то есть несколько наносекунд. Вызов, блокирующий получение информации по сети, может выполняться гораздо дольше: например, 200 миллисекунд (1/5 секунды). То есть если неблокирующий вызов длится 20 наносекунд, то блокирующий — 200 миллионов наносекунд. Процесс ждёт выполнения блокирующего вызова в 10 миллионов раз дольше.</p>

<p> </p>

<p><img alt="image" src="https://habrastorage.org/web/6f3/0d4/af5/6f30d4af539c492fb492af968883ccf4.jpg" /></p>

<p> </p>

<p>Ядро предоставляет средства для выполнения как блокирующих («считай данные из сетевого подключения и дай их мне»), так и неблокирующих («скажи мне, когда в этих сетевых подключениях появятся новые данные») вводов/выводов. И в зависимости от выбранного механизма длительность блокировки вызывающего процесса будет разительно отличаться.</p>

<p> </p>

<h3>Диспетчеризация (Scheduling)</h3>

<p> </p>

<p>Диспетчеризация также крайне важна, если у вас есть много потоков выполнения или процессов, которые начинают блокировать.</p>

<p> </p>

<p>Для нашей задачи разница между процессом и потоком выполнения невелика. В реальной жизни самое главное отличие между ними с точки зрения производительности заключается в том, что поток выполнения использует одну и ту же область памяти, а процессы получают собственные области. Поэтому отдельные процессы требуют гораздо больше памяти. Но если мы говорим о диспетчеризации, то всё сводится к тому, сколько потокам и процессам нужно времени выполнения на доступных ядрах процессора. Если у вас есть 300 потоков и восемь ядер, то придётся поделить время так, чтобы каждый поток получил свою долю: каждое ядро недолго выполняет один поток, а затем переходит к следующему. Это делается с помощью переключения контекста, когда процессор переключается с одного выполняемого потока/процесса на другой.</p>

<p> </p>

<p>Но с этими переключениями контекста связаны определённые затраты — они занимают какое-то время. Иногда это может происходить меньше, чем за 100 наносекунд, но нередко переключение занимает 1000 наносекунд и больше, в зависимости от особенностей реализации, скорости/архитектуры процессора, его кеша и т. д.</p>

<p> </p>

<p>И чем больше потоков выполнения (или процессов), тем больше переключений контекста. Если речь идёт о тысячах потоков, когда на переключения с каждого из них уходят сотни наносекунд, то всё выполняется очень неторопливо.</p>

<p> </p>

<p>Однако неблокирующие вызовы по существу говорят ядру: «Вызови меня только тогда, когда появятся новые данные или событие в одном из этих подключений». Эти вызовы созданы для эффективной обработки большой нагрузки по вводу/выводу и уменьшения количества переключений контекста.</p>

<p> </p>

<p>Ещё не потеряли нить рассуждения? Сейчас начинается самое интересное: мы рассмотрим, что некоторые популярные языки могут делать с вышеописанными инструментами, и сформулируем выводы о компромиссах между простотой использования и производительностью… и другими интересными пикантностями.</p>

<p> </p>

<p>В качестве примечания: в статье приведены тривиальные примеры (в некоторых случаях неполные, когда будут показаны только релевантные биты). Обращения к базе данных, внешние системы кеширования (Memcache и т. д.) и многие другие вещи в результате будут выполняться под капотом, но, по сути, это те же вызовы операций ввода/вывода, который окажут то же влияние, что и приведённые в статье простенькие примеры. В сценариях, в которых ввод/вывод описан как блокирующий (PHP, Java), HTTP-запросы и операции чтения и записи сами по себе являются блокирующими вызовами: в системе скрыто немало операций ввода/вывода, что приводит к проблемам с производительностью, которые надо учитывать.</p>

<p> </p>

<p>На выбор языка программирования для проекта влияет много факторов. Также немало факторов влияет на производительность. Но если вас беспокоит, что ваша программа в основном упрётся во ввод/вывод, если производительность ввода/вывода жизненно важна для проекта, то вам нужно знать обо всех этих факторах.</p>

<p> </p>

<p>В 1990-х многие носили обувь <a href="https://www.pinterest.com/pin/414401603185852181/">Converse</a> и писали CGI-скрипты на Perl. Затем появился PHP, и хотя его любят критиковать, но этот язык сильно облегчил создание динамических веб-страниц.</p>

<p> </p>

<p>PHP использует очень простую модель. Существует ряд вариаций, но среднестатистический PHP-сервер выглядит так.</p>

<p> </p>

<p>От пользовательского браузера поступает HTTP-запрос на ваш веб-сервер Apache. Тот создаёт отдельный процесс для каждого запроса, применяя некоторые оптимизации, позволяющие повторно использовать процессы ради минимизации их количества (создание процесса, к слову, задача медленная). Apache вызывает PHP и просит его выполнить соответствующий <code>.php</code>-файл, лежащий на диске. PHP-код выполняется и делает блокирующие вызовы ввода/вывода. Вы вызываете в PHP <code>file_get_contents()</code>, который под капотом выполняет системные вызовы <code>read()</code> и ждёт результаты.</p>

<p> </p>

<p>Конечно, реальный код просто встроен прямо в вашу страницу, а операции являются блокирующими:</p>

<p> </p>

<pre>
<code>query(\'SELECT id, data FROM examples ORDER BY id DESC limit 100\');

?&gt;</code></pre>

<p> </p>

<p>Вот как это выглядит с точки зрения интеграции в систему:</p>

<p> </p>

<p><img alt="image" src="https://habrastorage.org/web/f99/c14/fd2/f99c14fd27834ad29238bdc3fba60524.jpg" /></p>

<p> </p>

<p>Всё просто: один процесс на запрос. Вызовы ввода/вывода просто блокируют. Достоинства? Схема простая, и она работает. Недостатки? После 20 тысяч параллельных клиентских обращений сервер просто расплавится. Этот подход плохо масштабируем, потому что не используются предоставляемые ядром ОС инструменты для работы с большим объёмом ввода/вывода (epoll и пр.). Ситуацию усугубляет то, что выполнение отдельного процесса на каждый запрос приводит к потреблению большого объёма системных ресурсов, особенно памяти, которая зачастую заканчивается в первую очередь.</p>

<p> </p>

<p><em>Примечание: в Ruby используется очень похожий подход, и в широком, общем смысле в рамках нашей статьи они могут считаться одинаковыми.</em></p>

<p> </p>

<h3>Многопоточный подход: Java</h3>

<p> </p>

<p>Java пришёл в те времена, когда вы как раз купили своё первое доменное имя, и было так круто везде в разговоре вставлять словечки «точка ком». В Java встроена многопоточность (multithreading) — отличная функция (особенно на момент своего создания).</p>

<p> </p>

<p>Большинство Java веб-серверов создают новый поток выполнения для каждого поступающего запроса, и уже в этом потоке в конце концов вызывают функцию, которую написали вы, разработчик приложения.</p>

<p> </p>

<p>Выполнение ввода/вывода в Java Servlet выглядит так:</p>

<p> </p>

<pre>
<code>public void doGet(HttpServletRequest request,
    HttpServletResponse response) throws ServletException, IOException
{

    // blocking file I/O
    InputStream fileIs = new FileInputStream("/path/to/file");

    // blocking network I/O
    URLConnection urlConnection = (new URL("http://example.com/example-microservice")).openConnection();
    InputStream netIs = urlConnection.getInputStream();

    // some more blocking network I/O
out.println("...");
}</code></pre>

<p> </p>

<p>Поскольку наш метод <code>doGet</code> соответствует одному запросу и выполняется в собственном потоке, то вместо отдельного процесса для каждого запроса, требующего отдельной памяти, мы получаем отдельный поток выполнения. Это даёт приятные возможности, например можно поделиться состоянием или закешировать данные между потоками, потому что они способны обращаться к памяти друг друга. Но оказываемое при этом влияние на взаимодействие с диспетчером почти аналогично тому, что и в примере с PHP. Каждый запрос получает новый поток, и различные операции ввода/вывода блокируют внутри потока до тех пор, пока запрос не будет полностью выполнен. Потоки объединяются (pooled), чтобы минимизировать стоимость их создания и уничтожения, но в любом случае если у нас тысячи подключений, то создаются тысячи потоков, что плохо сказывается на работе диспетчера.</p>

<p> </p>

<p>Важным поворотным моментом в Java 1.4 (и значительным апгрейдом в 1.7) стала возможность выполнения неблокирующих вызовов ввода/вывода. Большинство приложений, веб- и прочих, их не используют, но они хотя бы есть. Некоторые Java веб-серверы пытаются как-то применять преимущества неблокирующих вызовов, однако подавляющее большинство развёрнутых Java-приложений всё ещё работает так, как описано выше.</p>

<p> </p>

<p><img alt="image" src="https://habrastorage.org/web/fa2/a95/768/fa2a957681384cee90ff3f49650556f2.jpg" /></p>

<p> </p>

<p>Java из коробки обладает некоторыми хорошими возможностями с точки зрения ввода/вывода, но они всё же не решают проблем, которые возникают в приложениях, активно использующих ввод/вывод и сильно тормозящих из-за обработки многих тысяч блокирующих потоков выполнения.</p>

<p> </p>

<h3>Неблокирующий ввод/вывод: Node</h3>

<p> </p>

<p>Node.js снискал себе популярность с точки зрения хорошей производительности ввода/вывода. Любой, кто хотя бы вскользь познакомился с Node, говорит, что он неблокирующий, что он эффективно обрабатывает операции ввода/вывода. И в целом это так. Но дьявол в деталях, точнее в колдовстве, с помощью которого достигается хорошая производительность.</p>

<p> </p>

<p>Суть сдвига парадигмы, реализуемого Node, такова: вместо того чтобы сказать: «Напиши здесь свой код для обработки запроса», он говорит: «Напиши здесь свой код для начала обработки запроса». Каждый раз, когда вам нужно использовать ввод/вывод, вы делаете запрос и отдаёте callback-функцию, который Node вызовет по окончании работы.</p>

<p> </p>

<p>Типичный код Node для выполнения операции ввода/вывода по запросу выглядит так:</p>

<p> </p>

<pre>
<code>http.createServer(function(request, response) {
    fs.readFile(\'/path/to/file\', \'utf8\', function(err, data) {
        response.end(data);
    });
});</code></pre>

<p> </p>

<p>Здесь есть две callback-функции. Первая вызывается, когда стартует запрос. Вторая — когда становятся доступными данные файла.</p>

<p> </p>

<p>По сути, это позволяет Node эффективно обрабатывать ввод/вывод между двумя callback-функциями. Более подходящий сценарий: вызов базы данных из Node. Но я не буду приводить конкретный пример, потому что там используется тот же принцип: вы инициируете вызов базы данных и даёте Node callback-функцию; он с помощью неблокирующих вызовов отдельно выполняет операции ввода/вывода, а когда запрошенные вами данные становятся доступны, вызывает callback-функцию. Этот механизм постановки в очередь вызовов ввода/вывода с последующим вызовом callback-функции называется циклом событий (event loop). И он хорошо работает.</p>

<p> </p>

<p><img alt="image" src="https://habrastorage.org/web/46e/903/929/46e903929e7e4f848d5d0647985a201d.jpg" /></p>

<p> </p>

<p>Но под капотом модели есть уловка. По большей части она связана с реализацией JS-движка V8 (JS-движок Chrome, используемый Node). Весь JS-код, который вы пишете, выполняется в одном потоке. Задумайтесь над этим. Это означает, что в то время как ввод/вывод происходит с помощью эффективных неблокирующих методик, ваш JS выполняет все связанные с процессором операции в одном потоке, когда один кусок кода блокирует следующий. Характерный пример того, к чему это способно привести: циклический проход по записям базы данных, чтобы неким образом обработать их, прежде чем отдавать клиенту. Вот как это может работать:</p>

<p> </p>

<pre>
<code>var handler = function(request, response) {

    connection.query(\'SELECT ...\', function (err, rows) {

        if (err) { throw err };

        for (var i = 0; i &lt; rows.length; i++) {
            // do processing on each row
        }

        response.end(...); // write out the results

    })

};</code></pre>

<p> </p>

<p>Хотя Node и обрабатывает ввод/вывод эффективно, но, например, цикл <code>for</code> использует такты процессора внутри одного, и только одного основного потока выполнения. И если у вас 10 тысяч подключений, то этот цикл может убить всё приложение, в зависимости от того, сколько он длится. Ведь в рамках основного потока выполнения нужно поочерёдно уделять процессорное время каждому запросу.</p>

<p> </p>

<p>Вся эта концепция основана на предпосылке, что операции ввода/вывода — самая медленная часть, а значит, важнее всего обрабатывать их как можно эффективнее, даже за счёт последовательной обработки всех остальных операций. В каких-то случаях это справедливо, но не во всех.</p>

<p> </p>

<p>Другое дело — это лишь мнение, — что может быть весьма утомительным писать кучу вложенных колбэков, и кто-то считает, что это сильно ухудшает читабельность кода. Нередко в Node-коде можно встретить четыре, пять и даже больше уровней вложенности.</p>

<p> </p>

<p>И мы снова вернулись к компромиссам. Модель Node хорошо работает в том случае, если основная причина плохой производительности связана с вводом/выводом. Но её ахиллесова пята в том, что вы можете использовать функцию, которая обрабатывает HTTP-запрос, вставить код, зависящий от процессора, и это приведёт к тормозам во всех сетевых подключениях.</p>

<p> </p>

<h2>Естественное неблокирование: Go</h2>

<p> </p>

<p>Прежде чем перейти к обсуждению Go, должен сообщить, что я его поклонник. Я использовал этот язык во многих проектах, открыто пропагандирую предоставляемые им выигрыши в производительности, причём отмечаю их роль в своей работе.</p>

<p> </p>

<p>И всё-таки давайте посмотрим, как Go работает с операциями ввода/вывода. Одна из ключевых особенностей языка — в нём есть собственный диспетчер. Вместо привязки каждого потока выполнения к одному потоку на уровне ОС Go использует концепцию горутин. В зависимости от задачи, выполняемой горутиной, среда выполнения языка может приписывать горутину к потоку ОС и заставлять исполнять её — или переводить её в режим ожидания и не ассоциировать с потоком ОС. Каждый запрос, поступающий от HTTP-сервера Go, обрабатывается в отдельной горутине.</p>

<p> </p>

<p>Схема работы диспетчера:</p>

<p> </p>

<p><img alt="image" src="https://habrastorage.org/web/cff/bb7/378/cffbb737891c4fe49c7357940cc33865.jpg" /></p>

<p> </p>

<p>Под капотом это реализовано с помощью разных ухищрений в runtime-среде Go, которая реализует вызовы ввода/вывода, делая запросы на запись/чтение/подключение и т. д., затем переводя текущую горутину в спящий режим с информацией, позволяющей снова активировать горутину, когда можно будет предпринять следующее действие.</p>

<p> </p>

<p>Фактически runtime-среда Go делает нечто, не слишком отличающееся от того, что делает Node. За исключением того, что механизм колбэков встроен в реализацию вызовов ввода/вывода и автоматически взаимодействует с диспетчером. Также Go не страдает от проблем, возникающих из-за того, что вам приходится помещать весь обрабатывающий код в один поток выполнения: Go автоматически распределяет горутины по такому количеству потоков ОС, какое он считает подходящим в соответствии с логикой диспетчера. Код выглядит так:</p>

<p> </p>

<pre>
<code>func ServeHTTP(w http.ResponseWriter, r *http.Request) {

    // the underlying network call here is non-blocking
    rows, err := db.Query("SELECT ...")

    for _, row := range rows {
        // do something with the rows,
// each request in its own goroutine
    }

    w.Write(...) // write the response, also non-blocking

}</code></pre>

<p> </p>

<p>Как видите, базовая структура кода того, что мы делаем, напоминает структуру более простых подходов, но под капотом использует неблокирующий ввод/вывод.</p>

<p> </p>

<p>В большинстве случаев нам удаётся «взять лучшее от двух миров». Для всех важных вещей используется неблокирующий ввод/вывод; при этом код выглядит как блокирующий, но всё же получается более лёгким в понимании и сопровождении. Остальное решается при взаимодействии между диспетчерами Go и ОС. Это неполное описание магии, и если вы создаёте большую систему, то рекомендуется уделить время более глубокому изучению работы с вводом/выводом. В то же время окружение, полученное вами из коробки, хорошо работает и масштабируется.</p>

<p> </p>

<p>У Go есть свои недостатки, но в целом они не относятся к работе с вводом/выводом.</p>

<p> </p>

<h2>Ложь, наглая ложь и бенчмарки</h2>

<p> </p>

<p>Трудно привести конкретные тайминги переключения контекста при использовании вышеописанных моделей. К тому же эта информация вряд ли была бы вам полезна. Вместо этого предлагаю прогнать простенькие бенчмарки и сравнить общую производительность HTTP-сервера в разных серверных окружениях. Но имейте в виду, что на результирующую производительность «HTTP-запрос/ответ» влияет много факторов, и приведённые здесь данные позволят получить лишь общее представление.</p>

<p> </p>

<p>Для каждой из сред я написал код, он считывает 64-килобайтный файл, заполненный случайными байтами, затем N раз применяет к нему хеширование по алгоритму SHA-256 (N определяется в строке URL-запроса, например, <code>.../test.php?n=100</code>) и выводит на экран получившийся хеш в шестнадцатеричном представлении. Это очень простой способ прогнать один и тот же бенчмарк с единообразным количеством операций ввода/вывода и управляемым способом увеличения использования процессора.</p>

<p> </p>

<p>Более подробную информацию о тестируемых средах можно почитать <a href="https://peabody.io/post/server-env-benchmarks/">здесь</a>.</p>

<p> </p>

<p>Сначала рассмотрим примеры с небольшим распараллеливанием (low concurrency). Прогоним 2000 итераций с 300 одновременными запросами и применением только одного хеширования к каждому запросу (N = 1):</p>

<p> </p>

<p><img alt="image" src="https://habrastorage.org/web/cf2/4e9/fab/cf24e9fab7ba4b2d9196b75b8b5ec8ac.jpg" /><br /><em>Сколько миллисекунд потребовалось на выполнение всех одновременных запросов. Чем меньше, тем лучше</em></p>

<p> </p>

<p>На основании одного графика трудно делать какие-то выводы. Но создаётся впечатление, что при таком объёме подключений и вычислений мы видим результаты, которые больше похожи на общую продолжительность выполнения самих языков, а не длительность обработки операций ввода/вывода. Обратите внимание, что медленнее всего работают так называемые скриптовые языки (слабая типизация, динамическая интерпретация).</p>

<p> </p>

<p>Увеличим N до 1000, оставив 300 одновременных запросов — нагрузка та же, но нужно выполнить в сто раз больше операций хеширования (значительно повышается нагрузка на процессор):</p>

<p> </p>

<p><img alt="image" src="https://habrastorage.org/web/ff7/9b7/86c/ff79b786c2f14ff5bdacbfb4d81cde0f.jpg" /><br /><em>Сколько миллисекунд потребовалось на выполнение всех одновременных запросов. Чем меньше, тем лучше</em></p>

<p> </p>

<p>Неожиданно значительно упала производительность Node, потому что операции, активно использующие процессор в каждом запросе, блокируют друг друга. Любопытно, что PHP стал гораздо лучше по производительности (по сравнению с другими) и обогнал Java. Нужно отметить, что реализация SHA-256 в PHP написана на Си, и в этом цикле путь выполнения (execution path) занимает гораздо больше времени, потому что теперь нам нужны 1000 итераций хеширования.</p>

<p> </p>

<p>Теперь сделаем 5000 одновременных запросов (N = 1) или как можно ближе к этому количеству. К сожалению, в большинстве сред частота отказов была значительной. На графике отражено общее количество запросов в секунду.</p>

<p> </p>

<p><img alt="image" src="https://habrastorage.org/web/755/578/efb/755578efbcaf412db5f68254f1effd54.jpg" /><br /><em>Общее количество запросов в секунду. Чем выше, тем лучше</em></p>

<p> </p>

<p>Картина совсем другая. Это предположение, но похоже на то, что в связке PHP + Apache при большом количестве подключений доминирующим фактором становятся удельные накладные расходы, связанные с созданием новых процессов и выделением им памяти, что негативно влияет на производительность PHP. <strong>Go стал победителем, за ним идут Java, потом Node, и последний — PHP</strong>.</p>

<p> </p>

<p>Несмотря на многочисленность факторов, влияющих на общую пропускную способность, и их варьирование в зависимости от приложения, чем больше вы будете знать о внутренностях протекающих процессов и сопутствующих компромиссах, тем лучше.</p>

<p> </p>

<h2>В итоге</h2>

<p> </p>

<p>Подводя итог вышесказанному, очевидно, что по мере развития языков развиваются и решения по работе с масштабными приложениями, обрабатывающими большое количество операций ввода/вывода.</p>

<p> </p>

<p>Честно говоря, несмотря на данные в этой статье описания, в PHP и Java есть <a href="http://reactphp.org/">реализации неблокирующих вводов/выводов</a>, <a href="http://undertow.io/">доступных для использования</a> в <a href="https://netty.io/">веб-приложениях</a>. Но они не так распространены, как вышеописанные подходы, и потому нужно принимать в расчёт сопутствующие этим подходам накладные операционные расходы. Не говоря уже о том, что ваш код должен быть структурирован так, чтобы работать в подобных средах. Ваше «нормальное» PHP или Java веб-приложение без серьёзных модификаций вряд ли будет работать в такой среде.</p>

<p> </p>

<p>Для сравнения, если выбрать несколько важных факторов, влияющих на производительность и простоту использования, то получается такая таблица:</p>

<p> </p>

<table class="table"><thead><tr><th><strong>Язык</strong></th>
			<th><strong>Потоки vs. процессы</strong></th>
			<th><strong>Неблокирующие I/O</strong></th>
			<th><strong>Простота использования</strong></th>
		</tr></thead><tbody><tr><td><strong>PHP</strong></td>
			<td>Процессы</td>
			<td>Нет</td>
			<td> </td>
		</tr><tr><td><strong>Java</strong></td>
			<td>Потоки</td>
			<td>Доступно</td>
			<td>Нужны колбэки</td>
		</tr><tr><td><strong>Node.js</strong></td>
			<td>Потоки</td>
			<td>Да</td>
			<td>Нужны колбэки</td>
		</tr><tr><td><strong>Go</strong></td>
			<td>Потоки (горутины)</td>
			<td>Да</td>
			<td>Колбэки не нужны</td>
		</tr></tbody></table><p> </p>

<p>С точки зрения потребления памяти потоки выполнения должны быть гораздо эффективнее процессов. Если также учесть факторы, относящиеся к неблокирующим операциям ввода/вывода, то по мере движения вниз по таблице общая ситуация с вводом/выводом улучшается. Так что если бы я выбирал победителя, то предпочёл бы Go.</p>

<p> </p>

<p>Но в любом случае выбор среды для создания проекта тесно связан с тем, насколько хорошо ваша команда знакома с той или иной средой, а значит, и с общей потенциальной продуктивностью. Поэтому не для каждой команды будет целесообразно с головой погрузиться в разработку веб-приложений и сервисов на Node или Go. Одна из частых причин неиспользования тех или иных языков и/или сред — необходимость поиска разработчиков, знакомых с данным инструментом. Тем не менее за последние 15 лет многое изменилось.</p>

<p> </p>

<p>Надеюсь, всё вышесказанное поможет вам лучше понять, что происходит под капотом нескольких языков и сред, и подскажет, как лучше решать проблемы масштабирования ваших приложений. Удачного ввода и вывода!</p>','image_id' => '95','category_id' => '2','active' => '1','created_at' => '2017-05-23 13:12:28','updated_at' => '2017-05-25 12:39:25'),
            array('id' => '6','title' => 'asdasdasd','description' => 'asdasdasd','content' => '<p>asdasdasdasdasdasdasdasdasd</p>','image_id' => NULL,'category_id' => '2','active' => '0','created_at' => '2017-05-24 08:22:46','updated_at' => '2017-05-24 11:36:24')
        );

        $this->seed('news', $news);

        /* `sot1`.`news_documents` */
        $news_documents = array(
            array('id' => '1','new_model_id' => '4','document_model_id' => '1'),
            array('id' => '2','new_model_id' => '4','document_model_id' => '2'),
            array('id' => '3','new_model_id' => '4','document_model_id' => '3'),
            array('id' => '4','new_model_id' => '4','document_model_id' => '4'),
            array('id' => '5','new_model_id' => '4','document_model_id' => '5'),
            array('id' => '6','new_model_id' => '4','document_model_id' => '6'),
            array('id' => '7','new_model_id' => '4','document_model_id' => '7'),
            array('id' => '8','new_model_id' => '4','document_model_id' => '8'),
            array('id' => '9','new_model_id' => '4','document_model_id' => '9'),
            array('id' => '10','new_model_id' => '4','document_model_id' => '10'),
            array('id' => '11','new_model_id' => '4','document_model_id' => '11'),
            array('id' => '12','new_model_id' => '4','document_model_id' => '12'),
            array('id' => '13','new_model_id' => '4','document_model_id' => '13'),
            array('id' => '16','new_model_id' => '4','document_model_id' => '14')
        );

        $this->seed('news_documents', $news_documents);

        /* `sot1`.`news_images` */
        $news_images = array(
            array('id' => '1','new_model_id' => '4','image_model_id' => '1'),
            array('id' => '2','new_model_id' => '4','image_model_id' => '2'),
            array('id' => '3','new_model_id' => '4','image_model_id' => '3'),
            array('id' => '4','new_model_id' => '4','image_model_id' => '4'),
            array('id' => '5','new_model_id' => '4','image_model_id' => '5'),
            array('id' => '8','new_model_id' => '4','image_model_id' => '9'),
            array('id' => '9','new_model_id' => '4','image_model_id' => '10'),
            array('id' => '16','new_model_id' => '1','image_model_id' => '84'),
            array('id' => '17','new_model_id' => '2','image_model_id' => '85'),
            array('id' => '18','new_model_id' => '3','image_model_id' => '86'),
            array('id' => '20','new_model_id' => '5','image_model_id' => '88'),
            array('id' => '21','new_model_id' => '1','image_model_id' => '89')
        );

        $this->seed('news_images', $news_images);

        /* `sot1`.`polls` */
        $polls = array(
            array('id' => '2','title' => 'Виды и типы ручек','content' => '<p>Несмотря на всеобщую компьютеризацию, переход на электронный документооборот, развитие интернет-сервисов для обмена письменными сообщениями и достижения техники в сфере фиксации информации, старая добрая ручка не сдает своих позиций. Представить себе жизнь и работу многих людей без этого простого и распространенного пишущего инструмента невозможно. Как бы быстро ни развивались технологии, от &laquo;аналогового&raquo; письма человечество не откажется еще очень долго. А вместе с ним будет потребность и в ручках.</p>','active' => '1','created_at' => '2017-05-24 07:21:11','updated_at' => '2017-05-25 10:31:48')
        );

        $this->seed('polls', $polls);

        /* `sot1`.`questions` */
        $questions = array(
            array('id' => '2','question' => 'О каком типе ручек вы не слышали?','count' => '22','poll_id' => '2','created_at' => '2017-05-24 07:23:39','updated_at' => '2017-06-19 16:50:50'),
            array('id' => '3','question' => 'О каком бренде вы слышите чаше всего?','count' => '22','poll_id' => '2','created_at' => '2017-05-24 22:26:32','updated_at' => '2017-06-19 16:50:50')
        );

        $this->seed('questions', $questions);

        /* `sot1`.`statements` */
        $statements = array(
            array('id' => '1','type_id' => '2','first_name' => NULL,'last_name' => 'Бабичев','communication' => 'info@babichev.net','content' => 'Привет мир!','created_at' => '2017-06-05 10:56:36','updated_at' => '2017-06-05 10:56:36'),
            array('id' => '2','type_id' => '2','first_name' => 'asd','last_name' => 'df','communication' => 'asdfsdf','content' => 'asdfasdfasdf','created_at' => '2017-06-20 13:58:04','updated_at' => '2017-06-20 13:58:04')
        );

        $this->seed('statements', $statements);

        /* `sot1`.`types` */
        $types = array(
            array('id' => '1','title' => 'чу-чу','active' => '1','created_at' => '2017-05-22 08:33:04','updated_at' => '2017-05-23 14:26:09'),
            array('id' => '2','title' => 'пу-пу','active' => '1','created_at' => '2017-05-22 08:33:09','updated_at' => '2017-05-23 14:26:12')
        );

        $this->seed('types', $types);

    }

}

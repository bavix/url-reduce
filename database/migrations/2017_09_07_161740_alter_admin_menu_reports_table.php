<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAdminMenuReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('admin_menu')->where('order', '>', 6)->increment('order');

        DB::table('admin_menu')->insert([
            'parent_id' => 0,
            'order' => 7,
            'title' => 'Reports',
            'icon' => 'fa-bug',
            'uri' => '/reports',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

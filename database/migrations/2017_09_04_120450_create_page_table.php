<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('friendly_url');

            $table->string('title');
            $table->string('description');
            $table->text('content');

            $table->boolean('active');

            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        DB::table('admin_menu')->where('order', '>', 5)->increment('order');

        DB::table('admin_menu')->insert([
            'parent_id' => 0,
            'order' => 6,
            'title' => 'Pages',
            'icon' => 'fa-newspaper-o',
            'uri' => '/pages',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('links'))
        {
            Schema::create('links', function (Blueprint $table)
            {
                $table->increments('id');

                $table->char('hash', 5);
                $table->string('url', 1600);

                $table->boolean('deleted');
                $table->boolean('fast_redirect');

                $table->timestamp('created_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));

                $table->timestamp('updated_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('analytics'))
        {
            Schema::create('analytics', function (Blueprint $table)
            {
                $table->increments('id');

                $table->unsignedInteger('link_id');
                $table->string('url_ref', 1600)->nullable();

                $table->timestamp('created_at')
                    ->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('analytics');
    }
}

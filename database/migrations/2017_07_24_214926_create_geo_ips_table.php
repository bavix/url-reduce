<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo_ips', function (Blueprint $table)
        {
            $table->increments('id');

            $table->unsignedInteger('from');
            $table->unsignedInteger('to');

            $table->string('country_code')->nullable();
            $table->string('country_name')->nullable();
            $table->string('region_code')->nullable();
            $table->string('region_name')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('time_zone')->nullable();

            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geo_ips');
    }
}

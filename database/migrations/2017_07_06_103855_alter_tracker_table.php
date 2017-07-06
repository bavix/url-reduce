<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTrackerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trackers', function (Blueprint $table) {
            $table->dropColumn([
                'language',
                'referer',
                'route',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trackers', function (Blueprint $table) {
            $table->string('referer')
                ->after('url');
            $table->string('route')
                ->after('referer');
            $table->string('language')
                ->after('parameters');
        });
    }
}

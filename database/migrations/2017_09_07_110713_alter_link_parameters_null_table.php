<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLinkParametersNullTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->json('parameters')->nullable()->change();
        });

        \Illuminate\Support\Facades\DB::table('links')
            ->whereNull(DB::raw('`parameters`->>\'$.title\''))
            ->update([
                'parameters' => null
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

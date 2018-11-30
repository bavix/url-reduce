<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->renameColumn('deleted', 'active');
            $table->dropColumn(['fast_redirect']);

            $table->unique(['hash']);

            $table->json('parameters')
                ->after('url');
        });

        \Illuminate\Support\Facades\DB::table('links')
            ->update([
                'active' => DB::raw('IF (active = 1, 0, 1)')
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

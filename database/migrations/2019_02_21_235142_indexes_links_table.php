<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IndexesLinksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->index(['hash']);
            $table->index(['hash', 'is_porn']);
            $table->index(['active', 'hash']);
            $table->index(['active', 'hash', 'is_porn']);
            $table->index(['active', 'blocked', 'hash']);
            $table->index(['active', 'blocked', 'hash', 'is_porn']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropIndex(['hash']);
            $table->dropIndex(['hash', 'is_porn']);
            $table->dropIndex(['active', 'hash']);
            $table->dropIndex(['active', 'hash', 'is_porn']);
            $table->dropIndex(['active', 'blocked', 'hash']);
            $table->dropIndex(['active', 'blocked', 'hash', 'is_porn']);
        });
    }

}

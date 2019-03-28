<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropOldTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tables = [
            'admin_menu',
            'admin_operation_log',
            'admin_permissions',
            'admin_role_menu',
            'admin_role_permissions',
            'admin_role_users',
            'admin_roles',
            'admin_user_permissions',
            'admin_users',
            'configs',
            'feedback',
            'languages',
        ];

        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        }
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

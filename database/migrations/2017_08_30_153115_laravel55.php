<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Laravel55 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::table('admin_menu')
            ->where('id', 8)
            ->whereOr('parent_id', 8)
            ->delete();

        DB::table('admin_permissions')->insert(
            ['name' => 'Access CP', 'slug' => 'cp']
        );

        DB::table('admin_role_permissions')->insert(
            ['role_id' => 1, 'permission_id' => 1]
        );

        DB::table('admin_role_users')->insert(
            ['role_id' => 1, 'user_id' => 1]
        );

        DB::table('admin_user_permissions')->insert(
            ['user_id' => 1, 'permission_id' => 1]
        );
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

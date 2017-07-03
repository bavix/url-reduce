<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('type_id');

            $table->string('parent_name');
            $table->string('phone');
            $table->string('passport_serial');
            $table->string('passport_number');
            $table->string('passport_from');
            $table->string('passport_division');
            $table->date('passport_date');

            $table->string('registration_address');
            $table->string('residential_address');

            $table->string('children_name');
            $table->string('children_doc_type');
            $table->string('children_doc_serial');
            $table->string('children_doc_number');
            $table->string('children_school');
            $table->string('children_сlass');

            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statements');
    }
}

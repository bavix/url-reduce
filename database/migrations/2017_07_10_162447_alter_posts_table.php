<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('news', 'posts');
        Schema::rename('news_images', 'posts_images');
        Schema::rename('news_documents', 'posts_documents');

        Schema::table('posts_images', function (Blueprint $table) {
            $table->renameColumn('new_model_id', 'post_id');
            $table->renameColumn('image_model_id', 'image_id');
        });

        Schema::table('posts_documents', function (Blueprint $table) {
            $table->renameColumn('new_model_id', 'post_id');
            $table->renameColumn('document_model_id', 'document_id');
        });

        Schema::table('albums_images', function (Blueprint $table) {
            $table->renameColumn('album_model_id', 'album_id');
            $table->renameColumn('image_model_id', 'image_id');
        });

        Schema::table('pages_images', function (Blueprint $table) {
            $table->renameColumn('page_model_id', 'page_id');
            $table->renameColumn('image_model_id', 'image_id');
        });

        Schema::table('pages_documents', function (Blueprint $table) {
            $table->renameColumn('page_model_id', 'page_id');
            $table->renameColumn('document_model_id', 'document_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // todo
    }
}

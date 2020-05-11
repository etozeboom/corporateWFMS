<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('title_meta',255);
            $table->string('author',255)->nullable();
            $table->time('reading_time');
            $table->longtext('text');
            $table->text('description');
            $table->string('alias',150)->unique();
            $table->timestamps();
            $table->string('keywords');
            $table->string('meta_desc');
            $table->integer('view_count')->default(0);
            $table->tinyInteger('img_plaha')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}

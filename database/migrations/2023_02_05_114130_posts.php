<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable(false)->index();
            $table->time('time_from')->nullable(false)->index();
            $table->time('time_to')->nullable(false)->index();
            $table->string('day')->nullable(false)->index();
            $table->string('class')->nullable(true)->index();
            $table->string('title')->nullable(true);
            $table->integer('quantity_classroom')->nullable(true);
            $table->text('subject')->nullable(true);
            $table->string('object')->nullable(true);
            $table->string('hability')->nullable(true);
            $table->string('methodology')->nullable(true);
            $table->longText('activities')->nullable(true);
            $table->text('systematization')->nullable(true);
            $table->longText('extrainfo')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

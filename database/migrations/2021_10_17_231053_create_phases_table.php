<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phases', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('titre')->nullable();
            $table->string('video')->nullable();
            $table->integer('numero')->nullable();
            $table->integer('temps')->nullable();
            $table->boolean('activated')->nullable();
            $table->boolean('finish')->nullable();
            $table->integer('cours_id')->unsigned();
            $table->integer('created_id')->unsigned();
            $table->foreign('created_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('phases');
    }
}

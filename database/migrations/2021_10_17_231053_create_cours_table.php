<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom')->nullable();
            $table->integer('temps')->nullable();
            $table->integer('numero')->nullable();
            $table->boolean('activated')->nullable();
            $table->boolean('finish')->nullable();
            $table->integer('formation_id')->unsigned();
            $table->integer('created_id')->unsigned();
            $table->foreign('created_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cours');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('question')->nullable();
            $table->integer('nbre_point')->nullable();
            $table->integer('cours_id')->unsigned();
            $table->integer(' created_id')->unsigned();
            $table->foreign('cours_id')->references('id')->on('cours')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign(' created_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}

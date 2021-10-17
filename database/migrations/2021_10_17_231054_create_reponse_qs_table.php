<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReponseQsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse_qs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('Reponse')->nullable();
            $table->double('note')->nullable();
            $table->string('statut');
            $table->boolean('finish')->nullable();
            $table->integer('question_id')->unsigned();
            $table->integer('created_id')->unsigned();
            $table->foreign('created_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reponse_qs');
    }
}

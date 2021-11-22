<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReponseCsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reponse_cs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('reponse')->nullable();
            $table->integer('commentaire_id')->unsigned();
            $table->integer('created_id');
            $table->foreign('commentaire_id')->references('id')->on('commentaires')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reponse_cs');
    }
}

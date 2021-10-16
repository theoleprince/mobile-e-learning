<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('od')->nullable();
            $table->string('idP')->nullable();
            $table->string('probleme')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->date('date_naissance')->nullable();
            $table->enum('sexe', ['Masculin','Feminin'])->nullable();
            $table->integer('formation_id')->unsigned()->nullable();
            $table->rememberToken();
            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Pour pouvoir utiliser les clés étrangères et les transactions
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telephone');
            $table->string('adresse')->nullable();
            $table->date('naissance')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('poste')->nullable();
            $table->date('date_embauche')->nullable();
            $table->string('specimen_cheque', 255)->nullable();
            $table->boolean('actif')->default(1);
            $table->bigInteger('id_role')->unsigned();
            $table->bigInteger('id_note_dossier')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('id_role')->references('id_role')->on('roles');

            $table->foreign('id_note_dossier')->references('id_note_dossier')->on('note_dossiers');
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
};

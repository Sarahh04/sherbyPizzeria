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
        Schema::create('produits', function (Blueprint $table) {
            $table->engine = 'InnoDB'; // Pour pouvoir utiliser les clés étrangères et les transactions
            $table->bigIncrements('id_produit'); // Clé primaire automatiquement créée avec "bigIncrements()".
            $table->string('nom');
            $table->decimal('prix', 10, 2);
            $table->string('delais');
            $table->integer('quantite');
            $table->integer('promo_courante');
            $table->string('description');
            $table->bigInteger('id_categorie')->unsigned();
            $table->string('dispo');
            $table->boolean('vedette');
            $table->timestamp('temps_indispo')->nullable();
        });

        Schema::table('produits', function (Blueprint $table) {
            $table->foreign('id_categorie')->references('id_categorie')->on('categorie_produits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
};

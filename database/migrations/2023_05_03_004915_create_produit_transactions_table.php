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
        Schema::create('produit_transactions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id_produit_transaction');
            $table->bigInteger('id_produit')->unsigned();
            $table->bigInteger('id_transaction')->unsigned();
            $table->integer('quantite');

        });

        Schema::table('produit_transactions', function (Blueprint $table) {
            $table->foreign('id_produit')->references('id_produit')->on('produits');
            $table->foreign('id_transaction')->references('id_transaction')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produit_transactions');
    }
};

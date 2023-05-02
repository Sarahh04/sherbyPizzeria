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
        Schema::create('element_transactions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_elemt_trans');
            $table->bigInteger('id_produit')->unsigned();
            $table->bigInteger('id_transaction')->unsigned();
            $table->integer('quantite')->unsigned();
        });

        Schema::table('element_transactions', function (Blueprint $table) {
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
        Schema::dropIfExists('element_transactions');
    }
};

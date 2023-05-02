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
            $table->bigIncrements('id_element_transaction');
            $table->bigInteger('id_produit')->unsigned();
            $table->integer('quantite')->unsigned();
            $table->decimal('prix', 10, 2);
            $table->decimal('taxe_provincial', 10, 2);
            $table->decimal('taxe_federal', 10, 2);
            $table->decimal('rabais', 10, 2);
        });

        Schema::table('element_transactions', function (Blueprint $table) {
            $table->foreign('id_produit')->references('id_produit')->on('produits');
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

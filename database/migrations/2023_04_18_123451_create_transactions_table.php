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
        Schema::create('transactions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigInteger('id_transaction');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_etat_transaction')->unsigned();
            $table->bigInteger('id_mode_paiement')->unsigned();
            $table->bigInteger('id_type_transaction')->unsigned();
            $table->bigInteger('no_facture');
            $table->dateTime('date_transaction');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_etat_transaction')->references('id_etat_transaction')->on('etat_transactions');
            $table->foreign('id_mode_paiement')->references('id_mode_paiement')->on('mode_paiements');
            $table->foreign('id_type_transaction')->references('id_type_transaction')->on('type_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};

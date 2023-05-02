<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_transactions')->insert([
            [
            'nom' => 'Vente',
            'description' => 'Vente de produits aux clients.'],
            [
            'nom' => 'Remboursement',
            'description' => 'Remboursement de la valeur d\'un ou plusiers itens de la commande.'],
            [
            'nom' => 'Achat',
            'description' => 'Achat de produits pour la pizzeria.']

        ]);
    }
}

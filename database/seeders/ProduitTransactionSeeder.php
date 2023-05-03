<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produit_transactions')->insert([
            [
            'id_produit' => 1,
            'id_transaction' => 1,
            'quantite' => 2
            ],
            [
            'id_produit' => 7,
            'id_transaction' => 1,
            'quantite' => 2
            ],
            [
            'id_produit' => 15,
            'id_transaction' => 1,
            'quantite' => 2
            ],
            [
            'id_produit' => 2,
            'id_transaction' => 2,
            'quantite' => 1
            ],
            [
            'id_produit' => 8,
            'id_transaction' => 2,
            'quantite' => 2
            ],
            [
            'id_produit' => 15,
            'id_transaction' => 2,
            'quantite' => 1
            ],
            [
            'id_produit' => 1,
            'id_transaction' => 3,
            'quantite' => 2
            ],
            [
            'id_produit' => 3,
            'id_transaction' => 3,
            'quantite' => 1
            ],
            [
            'id_produit' => 7,
            'id_transaction' => 3,
            'quantite' => 3
            ],
            [
            'id_produit' => 7,
            'id_transaction' => 3,
            'quantite' => 2
            ],
            [
            'id_produit' => 16,
            'id_transaction' => 3,
            'quantite' => 3
            ],
            [
            'id_produit' => 4,
            'id_transaction' => 4,
            'quantite' => 1
            ],
            [
            'id_produit' => 8,
            'id_transaction' => 4,
            'quantite' => 2
            ],
            [
            'id_produit' => 3,
            'id_transaction' => 5,
            'quantite' => 1
            ],
            [
            'id_produit' => 2,
            'id_transaction' => 6,
            'quantite' => 1
            ],
            [
            'id_produit' => 3,
            'id_transaction' => 6,
            'quantite' => 1
            ]
        ]);
    }
}

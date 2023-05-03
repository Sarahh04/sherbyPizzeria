<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'date_transaction' => '2023-01-05',
                'id_etat_transaction' => 1,
                'id_mode_paiement' => 1,
                'id_type_transaction' => 1,
                'id_user' => 1,
                'no_facture' => 1111
            ],
            [
                'date_transaction' => '2023-02-05',
                'id_etat_transaction' => 1,
                'id_mode_paiement' => 1,
                'id_type_transaction' => 1,
                'id_user' => 1,
                'no_facture' => 2222
            ],
            [
                'date_transaction' => '2023-02-05',
                'id_etat_transaction' => 2,
                'id_mode_paiement' => 2,
                'id_type_transaction' => 1,
                'id_user' => 1,
                'no_facture' => 3333
            ],
            [
                'date_transaction' => '2023-02-05',
                'id_etat_transaction' => 2,
                'id_mode_paiement' => 2,
                'id_type_transaction' => 1,
                'id_user' => 1,
                'no_facture' => 4444
            ],
            [
                'date_transaction' => '2023-03-05',
                'id_etat_transaction' => 3,
                'id_mode_paiement' => 3,
                'id_type_transaction' => 1,
                'id_user' => 1,
                'no_facture' => 5555
            ],
            [
                'date_transaction' => '2023-03-05',
                'id_etat_transaction' => 3,
                'id_mode_paiement' => 4,
                'id_type_transaction' => 1,
                'id_user' => 1,
                'no_facture' => 6666
            ]
        ]);
    }
}

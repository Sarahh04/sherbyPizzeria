<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtatTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etat_transactions')->insert([
            [
            'nom' => 'Active',
            'description' => 'État qui on ne peux pas faire des modifications mais de remboursement.'],
            [
            'nom' => 'Traitement',
            'description' => 'État qui on peux faire des modifications sur la commande.'],
            [
            'nom' => 'Inactive',
            'description' => 'État qui on ne peux pas faire ni modifications ni remboursement.']

        ]);

    }
}

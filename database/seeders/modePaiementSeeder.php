<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class modePaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mode_paiements')->insert([
            ['nom' => 'Comptant',
            'description' => 'Argent comptant'],
            [
            'nom' => 'Débit',
            'description' => 'Carte de débit'],
            [
            'nom' => 'Visa',
            'description' => 'Carte de crédit visa'],
            [
                'nom' => 'Mastercard',
                'description' => 'Carte de crédit mastercard']

            ]);

    }
}

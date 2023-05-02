<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorie_produits')->insert([
            ['nom' => 'Pizza',
            'description' => 'Pizza produit à la maison'],
            ['nom' => 'Soda',
            'description' => 'Boisson non alcoolisée pétillante'],
            ['nom' => 'Jus',
            'description' => 'Boisson non alcoolisée non pétillante'],
            ['nom' => 'Dessert',
            'description' => 'Pizza produit à la maison'],
            ['nom' => 'Garnitures',
            'description' => 'Garnitures pour la pizza'],
            ['nom' => 'Ingredients',
            'description' => 'Ingrédients pour la production de recettes']
        ]);
    }
}

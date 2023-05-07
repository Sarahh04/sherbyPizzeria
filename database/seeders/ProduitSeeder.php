<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produits')->insert([
            [
                'nom' => 'Pizza Fromage',
                'prix' => 11.90,
                'delais' => '30 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Pizza fromage seule',
                'id_categorie' => 1,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pizza Peperoni',
                'prix' => 13.90,
                'delais' => '35 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Pizza fromage avec peperoni',
                'id_categorie' => 1,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pizza Quatre Fromage',
                'prix' => 15.90,
                'delais' => '35 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Pizza aux quatre fromages (mozzarella, Gruyère, Maasdam et Estepe)',
                'id_categorie' => 1,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pizza Poulet',
                'prix' => 13.90,
                'delais' => '35 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Pizza aux poulet (mozzarella, poulet, ognion et cream cheese)',
                'id_categorie' => 1,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pizza Tout Granit',
                'prix' => 16.90,
                'delais' => '35 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Pizza tout granit (mozzarella, peperoni, ognion, champignon et piment vert)',
                'id_categorie' => 1,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pizza Végétarien',
                'prix' => 15.90,
                'delais' => '35 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Pizza végétarien (mozzarella, ognion, olives, champignon et piment vert)',
                'id_categorie' => 1,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Coca',
                'prix' => 3.90,
                'delais' => '5 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Cannete de coca 355 ml',
                'id_categorie' => 2,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pepsi',
                'prix' => 3.90,
                'delais' => '5 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Cannete de Pepsi 355 ml',
                'id_categorie' => 2,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Canada Dry',
                'prix' => 3.90,
                'delais' => '5 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Cannete de canada dry 355 ml',
                'id_categorie' => 2,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Jus de Pomme',
                'prix' => 4.50,
                'delais' => '5 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Cannete de jus de pomme Minut Maid 341 ml',
                'id_categorie' => 3,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Jus d\'Orange',
                'prix' => 4.50,
                'delais' => '5 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Cannete de jus de orange Minut Maid 341 ml',
                'id_categorie' => 3,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Jus Mix de Fruits',
                'prix' => 4.50,
                'delais' => '5 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Cannete de mix de fruits Frutopia 341 ml',
                'id_categorie' => 3,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Petit gateau',
                'prix' => 5.90,
                'delais' => '10 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Petit gateau aux chocolat rempli de chocolat foundant avec une boule de glace à la crème',
                'id_categorie' => 4,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Tiramisù',
                'prix' => 4.90,
                'delais' => '10 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Dessert italien classique avec des biscuits au rhum imbibés de café, une crème pâtissière crémeuse au mascarpone et de la crème fouettée.',
                'id_categorie' => 4,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Tarte aux pommes',
                'prix' => 5.40,
                'delais' => '10 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Petit tarte aux pommes.',
                'id_categorie' => 4,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Tarte aux citrons',
                'prix' => 5.40,
                'delais' => '10 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Petit tarte aux citrons.',
                'id_categorie' => 4,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pizza au chocolat',
                'prix' => 6.90,
                'delais' => '25 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Petit pizza au chocolat.',
                'id_categorie' => 4,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Mozzarela',
                'prix' => 3.90,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de mozzarela',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Gruyère',
                'prix' => 5.90,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de gruyère',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Maasdam',
                'prix' => 5.40,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de maasdam',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Estepe',
                'prix' => 4.90,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de estepe',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Cream cheese',
                'prix' => 4.90,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de cream cheese',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Peperoni',
                'prix' => 3.50,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de peperoni',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Ognion',
                'prix' => 1.50,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de ognion',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Piment vert',
                'prix' => 1.90,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de piment vert',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Champignon',
                'prix' => 1.90,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de champignon',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Poulet',
                'prix' => 4.90,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire de poulet',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Olives',
                'prix' => 2.90,
                'delais' => '2 min',
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Portion supplémentaire d\'olives',
                'id_categorie' => 5,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pièce de mozzarela',
                'prix' => 24.90,
                'delais' => 0,
                'quantite' => 20,
                'promo_courante' => 0,
                'description' => 'Pièce de mozzarela avec 10 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pièce de gruyère',
                'prix' => 34.90,
                'delais' => 0,
                'quantite' => 10,
                'promo_courante' => 0,
                'description' => 'Pièce de gruyère avec 10 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pièce de maasdam',
                'prix' => 17.90,
                'delais' => 0,
                'quantite' => 10,
                'promo_courante' => 0,
                'description' => 'Pièce de massdam avec 5 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pièce de estepe',
                'prix' => 15.90,
                'delais' => 0,
                'quantite' => 10,
                'promo_courante' => 0,
                'description' => 'Pièce d\'estepe avec 5 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Packet de cream cheese',
                'prix' => 34.90,
                'delais' => 0,
                'quantite' => 5,
                'promo_courante' => 0,
                'description' => 'Packet de cream cheese avec 15 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Pièce de peperoni',
                'prix' => 9.50,
                'delais' => 0,
                'quantite' => 15,
                'promo_courante' => 0,
                'description' => 'Pièce de peperoni avec 2 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Sac d\'ognion',
                'prix' => 7.90,
                'delais' => 0,
                'quantite' => 4,
                'promo_courante' => 0,
                'description' => 'Sac d\'ognion avec 20 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte de piment vert',
                'prix' => 18.90,
                'delais' => 0,
                'quantite' => 4,
                'promo_courante' => 0,
                'description' => 'Boîte de piment vert avec 10 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte champignon',
                'prix' => 21.90,
                'delais' => 0,
                'quantite' => 5,
                'promo_courante' => 0,
                'description' => 'Boîte champignon avec 10 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte de poulet',
                'prix' => 27.9,
                'delais' => 0,
                'quantite' => 5,
                'promo_courante' => 0,
                'description' => 'Boîte de poulet rôti avec 10 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Seaux d\'olives',
                'prix' => 22.90,
                'delais' => 0,
                'quantite' => 0,
                'promo_courante' => 0,
                'description' => 'Seaux d\'olives avec 20 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Sac de farine de blé blanc',
                'prix' => 22.90,
                'delais' => 0,
                'quantite' => 20,
                'promo_courante' => 0,
                'description' => 'Sac de farine de blé blanc avec 20 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Sac de farine de blé entière',
                'prix' => 25.90,
                'delais' => 0,
                'quantite' => 4,
                'promo_courante' => 0,
                'description' => 'Sac de farine de blé entière avec 20 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Sac de sucre',
                'prix' => 18.90,
                'delais' => 0,
                'quantite' => 4,
                'promo_courante' => 0,
                'description' => 'Sac de sucre avec 20 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Sac de sel',
                'prix' => 8.90,
                'delais' => 0,
                'quantite' => 5,
                'promo_courante' => 0,
                'description' => 'Sac de sucre avec 10 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Seaux d\'oil d\'olive',
                'prix' => 32.90,
                'delais' => 0,
                'quantite' => 10,
                'promo_courante' => 0,
                'description' => 'Seaux d\'oil d\'olive avec 10 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte de levure à pizza',
                'prix' => 15.90,
                'delais' => 0,
                'quantite' => 4,
                'promo_courante' => 0,
                'description' => 'Boîte de levure à pizza avec 5 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte de levure à pâte',
                'prix' => 12.90,
                'delais' => 0,
                'quantite' => 2,
                'promo_courante' => 0,
                'description' => 'Boîte de levure à pâte avec 5 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte d\'oeufs',
                'prix' => 37.90,
                'delais' => 0,
                'quantite' => 2,
                'promo_courante' => 0,
                'description' => 'Boîte d\'oeufs avec 300 oeufs',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte de boeuf',
                'prix' => 52.90,
                'delais' => 0,
                'quantite' => 2,
                'promo_courante' => 0,
                'description' => 'Boîte de boeuf avec 36 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte de lait',
                'prix' => 31.90,
                'delais' => 0,
                'quantite' => 2,
                'promo_courante' => 0,
                'description' => 'Boîte de lait avec 24 litres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte de citron',
                'prix' => 17.90,
                'delais' => 0,
                'quantite' => 2,
                'promo_courante' => 0,
                'description' => 'Boîte de citron avec 10 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte de pommes',
                'prix' => 14.90,
                'delais' => 0,
                'quantite' => 2,
                'promo_courante' => 0,
                'description' => 'Boîte de pommes avec 20 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
            [
                'nom' => 'Boîte de chocolat',
                'prix' => 18.90,
                'delais' => 0,
                'quantite' => 4,
                'promo_courante' => 0,
                'description' => 'Boîte de lait avec 10 livres',
                'id_categorie' => 6,
                'dispo' => 'disponible'
            ],
        ]);
    }
}

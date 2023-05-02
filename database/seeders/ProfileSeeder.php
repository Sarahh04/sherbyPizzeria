<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $passHash = Hash::make('abc12345');

        DB::table('users')->insert([
            ['name' => 'Billie Lavertu',
                'email' => 'Billie@bidon.com',
                'telephone' => '123-123-1234',
                'adresse' => '12 rue chien',
                'naissance' => '2022-09-02',
                'password' => $passHash,
                'poste' => 'Directrice',
                'date_embauche' => '2023-05-01',
                'id_role' => 1
            ]
        ]);
    }
}

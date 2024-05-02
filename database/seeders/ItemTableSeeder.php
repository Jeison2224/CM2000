<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('items')->insert([
            'name' => 'item 1',
            'description' => 'aumenta los clics de forma pasiva en 2',
            'precio' => 10,
            'cantidadclics'=> 2,
        ]);
        DB::table('items')->insert([
            'name' => 'item 2',
            'description' => 'aumenta los clics de forma pasiva en 4',
            'precio' => 10,
            'cantidadclics' => 4,
        ]);
        DB::table('items')->insert([
            'name' => 'item 3',
            'description' => 'aumenta los clics de forma pasiva en 8',
            'precio' => 30,
            'cantidadclics' => 8,
        ]);
    }
}

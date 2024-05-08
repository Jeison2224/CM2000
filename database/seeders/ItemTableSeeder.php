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
            'name' => 'Hiurgiy',
            'description' => 'aumenta los clics de forma pasiva en 1',
            'precio' => 1,
            'cantidadclics'=> 1,
        ]);
        DB::table('items')->insert([
            'name' => 'Klosvans',
            'description' => 'aumenta los clics de forma pasiva en 2',
            'precio' => 8,
            'cantidadclics' => 2,
        ]);
        DB::table('items')->insert([
            'name' => 'Piwecer',
            'description' => 'aumenta los clics de forma pasiva en 4',
            'precio' => 64,
            'cantidadclics' => 4,
        ]);
        DB::table('items')->insert([
            'name' => 'Iinshall',
            'description' => 'aumenta los clics de forma pasiva en 8',
            'precio' => 512,
            'cantidadclics' => 8,
        ]);
        DB::table('items')->insert([
            'name' => 'Qonbruix',
            'description' => 'aumenta los clics de forma pasiva en 16',
            'precio' => 4096,
            'cantidadclics' => 16,
        ]);
        DB::table('items')->insert([
            'name' => 'Lillelv',
            'description' => 'aumenta los clics de forma pasiva en 32',
            'precio' => 32768,
            'cantidadclics' => 32,
        ]);
        DB::table('items')->insert([
            'name' => 'Frioxaz',
            'description' => 'aumenta los clics de forma pasiva en 64',
            'precio' => 262144,
            'cantidadclics' => 64,
        ]);
        DB::table('items')->insert([
            'name' => 'Pullar',
            'description' => 'aumenta los clics de forma pasiva en 128',
            'precio' => 2097152,
            'cantidadclics' => 128,
        ]);
        DB::table('items')->insert([
            'name' => 'Dewass',
            'description' => 'aumenta los clics de forma pasiva en 256',
            'precio' => 16777216,
            'cantidadclics' => 256,
        ]);
        DB::table('items')->insert([
            'name' => 'Krayfgur',
            'description' => 'aumenta los clics de forma pasiva en 512',
            'precio' => 134217728,
            'cantidadclics' => 512,
        ]);
        DB::table('items')->insert([
            'name' => 'Porstyk',
            'description' => 'aumenta los clics de forma pasiva en 2224',
            'precio' => 1073741824,
            'cantidadclics' => 2224,
        ]);
        DB::table('items')->insert([
            'name' => 'Gyevrer',
            'description' => 'aumenta los clics de forma pasiva en 1024',
            'precio' => 8589934592,
            'cantidadclics' => 1024,
        ]);
        DB::table('items')->insert([
            'name' => 'Oinzus',
            'description' => 'aumenta los clics de forma pasiva en 4096',
            'precio' => 68719476736,
            'cantidadclics' => 4096,
        ]);
        DB::table('items')->insert([
            'name' => 'Vionhaas',
            'description' => 'aumenta los clics de forma pasiva en 8192',
            'precio' => 549755813888,
            'cantidadclics' => 8192,
        ]);
        DB::table('items')->insert([
            'name' => 'Palhurrak',
            'description' => 'aumenta los clics de forma pasiva en 16384',
            'precio' => 4398046511104,
            'cantidadclics' => 16384,
        ]);
        DB::table('items')->insert([
            'name' => 'Atensis',
            'description' => 'aumenta los clics de forma pasiva en 32768',
            'precio' => 35184372088832,
            'cantidadclics' => 32768,
        ]);
        DB::table('items')->insert([
            'name' => 'Wountuhs',
            'description' => 'aumenta los clics de forma pasiva en 65536',
            'precio' => 281474976710656,
            'cantidadclics' => 65536,
        ]);
        DB::table('items')->insert([
            'name' => 'Eimnas',
            'description' => 'aumenta los clics de forma pasiva en 131072',
            'precio' => 2251799813685248,
            'cantidadclics' => 131072,
        ]);
        DB::table('items')->insert([
            'name' => 'Frolanta',
            'description' => 'aumenta los clics de forma pasiva en 262144',
            'precio' => 18014398509481984,
            'cantidadclics' => 262144,
        ]);
        DB::table('items')->insert([
            'name' => 'Zindor',
            'description' => 'aumenta los clics de forma pasiva en 524288',
            'precio' => 144115188075855872,
            'cantidadclics' => 524288,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('logros')->insert([
            'name' => 'Doble Dígitos',
            'description' => 'Alcanza una puntuación de 10 haciendo clics',
            'point' => 10,
        ]);
        DB::table('logros')->insert([
            'name' => 'Binario Brillante',
            'description' => 'Haz clic dos veces para convertir un número decimal a binario',
            'point' => 2,
        ]);
        DB::table('logros')->insert([
            'name' => 'Dupla Destreza',
            'description' => 'Alcanza una puntuación de 22 haciendo clics',
            'point' => 22,
        ]);
    }
}

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
            'nombre' => 'Doble Dígitos',
            'description' => 'Alcanza una puntuación de 10 haciendo clics',
            'point' => 10,
        ]);
        DB::table('logros')->insert([
            'nombre' => 'Binario Brillante',
            'description' => 'Haz clic dos veces para convertir un número decimal a binario',
            'point' => 8,
        ]);
        DB::table('logros')->insert([
            'nombre' => 'Dupla Destreza',
            'description' => 'Alcanza una puntuación de 22 haciendo clics',
            'point' => 22,
        ]);
    }
}

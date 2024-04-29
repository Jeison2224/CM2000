<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('rankings')->insert([
            'nombre' => 'pepe',
            'descripcion' => 'test',
            'valor' => 500,
        ]);
        DB::table('rankings')->insert([
            'nombre' => 'pedro',
            'descripcion' => 'test',
            'valor' => 200,
        ]);
        DB::table('rankings')->insert([
            'nombre' => 'jimmy',
            'descripcion' => 'test',
            'valor' => 400,
        ]);
    }
}

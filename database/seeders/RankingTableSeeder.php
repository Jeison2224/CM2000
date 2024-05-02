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
            'name' => 'pepe',
            'point' => 500,
        ]);
        DB::table('rankings')->insert([
            'name' => 'pedro',
            'point' => 200,
        ]);
        DB::table('rankings')->insert([
            'name' => 'jimmy',
            'point' => 400,
        ]);
    }
}

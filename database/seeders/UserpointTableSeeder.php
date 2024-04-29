<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserpointTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('userpoints')->insert([
            'user_id' => '1',
            'point' => 200,
        ]);
        DB::table('userpoints')->insert([
            'user_id' => '2',
            'point' => 1000,
        ]);
        DB::table('userpoints')->insert([
            'user_id' => '3',
            'point' => 500,
        ]);
    }
}

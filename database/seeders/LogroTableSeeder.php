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
            'name' => 'Doble Dígito',
            'description' => 'Alcanza un total de 1 punto. ¡Has alcanzado tu primer hito de dos dígitos!',
            'point' => 1,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Doblemente Doble',
            'description' => 'Alcanza un total de 8 puntos. ¡Has duplicado tus puntos, ahora ve por más!',
            'point' => 8,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Cuadrado de Dos',
            'description' => 'Consigue 64 puntos. Tu puntuación es el resultado de multiplicar 2 por sí mismo.',
            'point' => 64,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Poder de Dos',
            'description' => 'Consigue 512 puntos. Un comienzo modesto, pero cada punto cuenta.',
            'point' => 512,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Pareja Perfecta',
            'description' => 'Consigue 4096 puntos. ¡Tu puntuación es un reflejo de la perfección en el número 2!',
            'point' => 4096,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Suma Doble',
            'description' => 'Consigue 32768 puntos. Has superado la marca de una sola cifra.',
            'point' => 32768,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Puntos Dobles',
            'description' => 'Consigue 262144 puntos. ¡Tu puntuación se ha duplicado, sigue así!',
            'point' => 262144,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Redoblado',
            'description' => 'Consigue 2097152 puntos. ¡Has duplicado tus puntos dos veces, un logro impresionante!',
            'point' => 2097152,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Duplex',
            'description' => 'Consigue 16777216 puntos. Tu puntuación es sinónimo de una duplicación completa.',
            'point' => 16777216,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Dos por Uno',
            'description' => 'Consigue 134217728 puntos. Has superado la marca de dos dígitos.',
            'point' => 134217728,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Doble Vuelta',
            'description' => 'Consigue 1073741824 puntos. ¡Tu puntuación es un testimonio de tu perseverancia!',
            'point' => 1073741824,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Doble y Más',
            'description' => 'Consigue 8589934592 puntos. ¡Doblar tus puntos es solo el comienzo!',
            'point' => 8589934592,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Dos Veces Mejor',
            'description' => 'Consigue 68719476736 puntos. ¡Has mejorado tu puntuación anterior por dos!',
            'point' => 68719476736,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Potencia de Dos',
            'description' => 'Consigue 549755813888 puntos. ¡Tu puntuación es el resultado de elevar 2 a la primera potencia!',
            'point' => 549755813888,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Doble Impacto',
            'description' => 'Consigue 4398046511104 puntos. ¡Tu puntuación es un golpe doble para la competencia!',
            'point' => 4398046511104,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Doble Esfuerzo',
            'description' => 'Consigue 35184372088832 puntos. ¡Has puesto el doble de esfuerzo y ha dado sus frutos!',
            'point' => 35184372088832,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Doble Avance',
            'description' => 'Consigue 281474976710656 puntos. Has avanzado al siguiente nivel con una puntuación doble.',
            'point' => 281474976710656,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Doble Logro',
            'description' => 'Consigue 2251799813685248 puntos. ¡Tu puntuación es un logro doblemente impresionante!',
            'point' => 2251799813685248,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Doble Visión',
            'description' => 'Consigue 18014398509481984 puntos. ¡Tienes una visión clara de tu camino hacia el éxito!',
            'point' => 18014398509481984,
        ]);
        
        DB::table('logros')->insert([
            'name' => 'Doble Salto',
            'description' => 'Consigue 144115188075855872 puntos. ¡Has dado un salto doble en tu puntuación!',
            'point' => 144115188075855872,
        ]);
        
    }
}

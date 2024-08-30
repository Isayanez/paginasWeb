<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPokemonSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('tipo_pokemon')->insert([
            'descripcion_tipo'=>'Bicho'
        ]);
        DB::table('tipo_pokemon')->insert([
            'descripcion_tipo'=>'Dragón'
        ]);
        DB::table('tipo_pokemon')->insert([
            'descripcion_tipo'=>'Eléctrico'
        ]);
        DB::table('tipo_pokemon')->insert([
            'descripcion_tipo'=>'Hada'
        ]);
        DB::table('tipo_pokemon')->insert([
            'descripcion_tipo'=>'Lucha'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'nome' => 'DOUGLAS',
            'documento' => '98654321234',
            'telefone' => '12345678910',
            'usuario' => 'a',
            'senha' => Hash::make('a'),
            'cargo' => '1',
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
        ]);

        DB::table('usuarios')->insert([
            'nome' => 'ARTHUR',
            'documento' => '12345678910',
            'telefone' => '98654321234',
            'usuario' => 'b',
            'senha' => Hash::make('b'),
            'cargo' => '2',
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
        ]);
    }
}

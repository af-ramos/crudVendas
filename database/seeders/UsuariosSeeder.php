<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'nome' => 'DOUGLAS',
            'documento' => '12345678910',
            'telefone' => '98654321234',
            'usuario' => 'douglas',
            'senha' => '12345',
            'cargo' => '2',
            'created_at' => Carbon::now(), 
            'updated_at' => Carbon::now()
        ]);
    }
}

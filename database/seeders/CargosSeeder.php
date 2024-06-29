<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cargos')->insert(['descricao' => 'CLIENTE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('cargos')->insert(['descricao' => 'VENDEDOR', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}

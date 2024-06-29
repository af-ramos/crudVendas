<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatusPedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status_pedidos')->insert(['descricao' => 'PENDENTE', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('status_pedidos')->insert(['descricao' => 'PAGO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        DB::table('status_pedidos')->insert(['descricao' => 'FINALIZADO', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CargosSeeder;
use Database\Seeders\StatusPedidosSeeder;
use Database\Seeders\UsuariosSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CargosSeeder::class,
            UsuariosSeeder::class,
            StatusPedidosSeeder::class
        ]);
    }
}

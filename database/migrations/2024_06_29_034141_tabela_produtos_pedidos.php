<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos_pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('produto');
            $table->integer('quantidade');
            $table->double('preco_individual');
            $table->unsignedBigInteger('pedido');
            $table->timestamps();

            $table->foreign('pedido')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

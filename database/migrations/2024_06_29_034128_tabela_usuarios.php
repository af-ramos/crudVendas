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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 30);
            $table->string('documento', 14);
            $table->string('telefone', 11)->nullable();
            $table->string('usuario', 20);
            $table->string('senha', 256);
            $table->unsignedBigInteger('cargo');
            $table->timestamps();

            $table->foreign('cargo')->references('id')->on('cargos');
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

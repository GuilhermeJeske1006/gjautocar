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
        Schema::create('tipo_automovels', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_automovel');
            $table->timestamps();
        });

        DB::table('tipo_automovels')->insert([
            ['tipo_automovel' => 'Carro'],
            ['tipo_automovel' => 'Moto'],
            ['tipo_automovel' => 'Caminhão'],
            ['tipo_automovel' => 'Outros'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_automovels');
    }
};

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
        // Preenchendo a tabela 'marca_automovels'
        DB::table('marca_automovels')->insert([
            
        ]);

        // Preenchendo a tabela 'modelo_automovels'
        DB::table('modelo_automovels')->insert([
            

        ]);

        // ... adicione mais modelos de motos para as demais marcas

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

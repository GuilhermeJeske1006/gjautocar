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
        Schema::create('modelo_automovels', function (Blueprint $table) {
            $table->id();
            $table->string('nome_modelo', 100);
            $table->unsignedBigInteger('marca_id');
            $table->timestamps();
            $table->foreign('marca_id')->references('id')->on('marca_automovels')->onDelete("cascade");;

        });
  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelo_automovels');
    }
};

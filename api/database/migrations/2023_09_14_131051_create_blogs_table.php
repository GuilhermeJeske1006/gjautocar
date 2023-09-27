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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->string("subtitulo");
            $table->string("foto")->nullable();
            $table->text("texto")->nullable();
            $table->unsignedBigInteger('empresa_id'); 

            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

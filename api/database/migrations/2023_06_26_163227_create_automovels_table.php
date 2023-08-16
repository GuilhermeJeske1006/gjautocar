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
        Schema::create('automoveis', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('ano', 9)->nullable();
            $table->string('especificacao_modelo')->nullable();
            $table->decimal('quilometragem')->nullable();
            $table->string('cambio')->nullable();
            $table->string('tipo_combustivel')->nullable();
            $table->string('cor')->nullable();
            $table->integer('qtd_portas')->nullable();
            $table->integer('final_placa')->nullable();
            $table->text('observacao')->nullable();
            $table->unsignedBigInteger('tipo_automovel_id'); // carro, moto
            $table->unsignedBigInteger('categoria_id'); // Sedan, picape
            $table->unsignedBigInteger('empresa_id'); // Sedan, picape

            $table->timestamps();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete("cascade");
            $table->foreign('tipo_automovel_id')->references('id')->on('tipo_automovels')->onDelete("cascade");
            $table->foreign('categoria_id')->references('id')->on('categoria_automovels')->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('automoveis', function (Blueprint $table) {
            // $table->dropForeign(['empresa_id']);
            $table->dropForeign(['tipo_automovel_id']);
            $table->dropForeign(['categoria_id']);
        });

        Schema::dropIfExists('automoveis');
    }

};

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
        Schema::table('automoveis', function (Blueprint $table) {
            $table->unsignedBigInteger('modelo_id')->nullable();
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->string('foto_capa');
            $table->string('motor')->nullable();
            $table->boolean('automovel_destaque')->default(true);
            $table->boolean('ir_para_site')->default(true);
            $table->decimal('valor');
            $table->foreign('modelo_id')->references('id')->on('modelo_automovels')->onDelete("cascade");
            $table->foreign('marca_id')->references('id')->on('marca_automovels')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('automoveis', function (Blueprint $table) {
            $table->dropForeign(['modelo_id']);
            $table->dropForeign(['marca_id']);

        });
    }
};

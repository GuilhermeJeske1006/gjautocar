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
        Schema::create('item_automovels', function (Blueprint $table) {
            $table->id();
            $table->string('nome_item');
            $table->unsignedBigInteger('automovel_id');
            $table->timestamps();

            $table->foreign('automovel_id')->references('id')->on('automoveis')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_automovels', function (Blueprint $table) {
            $table->dropForeign(['automovel_id']);
        });

        Schema::dropIfExists('item_automovels');
    }

};

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
        Schema::create('comentario_blogs', function (Blueprint $table) {
            $table->id();
            $table->string("nome_usuario");
            $table->text("comentario");
            $table->unsignedBigInteger('blog_id');

            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentario_blogs');
    }
};

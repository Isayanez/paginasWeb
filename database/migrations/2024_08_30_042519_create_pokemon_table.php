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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_unicode_ci';
            $table->id();
            $table->string('nombre');
            $table->string('tipo');
            $table->text('url_imagen');
            $table->integer('hp');
            $table->integer('defensa');
            $table->integer('ataque');
            $table->integer('rapidez');
            $table->foreignId('tipo_id')->constrained('tipo_pokemon')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};

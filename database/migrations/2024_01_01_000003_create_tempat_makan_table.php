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
        Schema::create('tempat_makan', function (Blueprint $table) {
            $table->id('idTempat');
            $table->string('namaTempat');
            $table->text('alamat');
            $table->string('kategori')->nullable(); // makananberat, jajanan, minuman, frozen_food
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_makan');
    }
};


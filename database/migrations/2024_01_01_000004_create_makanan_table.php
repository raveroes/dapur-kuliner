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
        Schema::create('makanan', function (Blueprint $table) {
            $table->id('idMakanan');
            $table->foreignId('idTempat')->constrained('tempat_makan', 'idTempat')->onDelete('cascade');
            $table->string('namaMenu');
            $table->decimal('harga', 10, 2);
            $table->text('deskripsi');
            $table->string('kategori')->nullable(); // makananberat, jajanan, minuman, frozen_food
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makanan');
    }
};


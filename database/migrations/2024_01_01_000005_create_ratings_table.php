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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('makanan_id')->constrained('makanan', 'idMakanan')->onDelete('cascade');
            $table->tinyInteger('rating')->unsigned(); // 1-5
            $table->timestamps();
            
            // Ensure one user can only rate one makanan once
            $table->unique(['user_id', 'makanan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};


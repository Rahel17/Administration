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
        Schema::create('kas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('bulan'); // Nama bulan pembayaran
            $table->string('bukti'); // Path bukti pembayaran (nullable jika belum mengajukan)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status pengajuan
            $table->decimal('nominal', 10, 2); // Jumlah uang kas
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kas');
    }
};
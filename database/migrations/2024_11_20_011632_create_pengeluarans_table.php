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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('kategori', ['proker','lainnya']);
            $table->text('uraian');
            $table->enum('bidang', ['Inti','Pemberdayaan Sumber Daya Manusia', 'Kerohanian','Hubungan Masyarakat','Komunikasi dan Informasi','Dana Usaha','Minat Bakat']);
            $table->decimal('nominal', 15, 2);
            $table->string('penganggungjawab');
            $table->string('dokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};

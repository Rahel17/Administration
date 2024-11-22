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
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('kategori', ['proposal','sisa_proker','kas_wajib','lainnya']);
            $table->text('uraian');
            $table->enum('bidang', ['Inti','PSDM', 'Kerohanian','Humas','Kominfo','Danus','Minbak']);
            $table->decimal('nominal', 15, 2);
            $table->string('penanggungjawab');
            $table->string('dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukans');
    }
};

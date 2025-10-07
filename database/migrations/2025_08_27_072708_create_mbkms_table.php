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
        Schema::create('mbkm', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20);
            $table->string('jenis', 255)->nullable();
            $table->string('nama_program', 255)->nullable();
            $table->string('level', 255)->nullable();
            $table->integer('jumlah_peserta')->default(0);
            $table->date('tahun_kegiatan_a', 255)->nullable();
            $table->date('tanggal_kegiatan_e', 255)->nullable();
            $table->integer('tahun_kegiatan')->nullable();
            $table->string('dokumen_pendukung', 255)->nullable();
            $table->integer('status')->default(0);
            $table->timestamp('modified')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mbkm');
    }
};

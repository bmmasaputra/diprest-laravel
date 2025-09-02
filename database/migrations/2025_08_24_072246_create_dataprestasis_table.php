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
        Schema::create('dataprestasi', function (Blueprint $table) {
            $table->integer('id_prestasi')->primary();
            $table->string('nim', 20);
            $table->string('nama_kegiatan', 255)->nullable();
            $table->string('nama_penyelenggara', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('kategori_kegiatan', 255)->nullable();
            $table->string('tingkat_kegiatan', 20)->nullable();
            $table->integer('jumlah_asal_peserta')->default(0);
            $table->integer('jumlah_peserta')->default(0);
            $table->string('tempat_kegiatan', 255)->nullable();
            $table->string('capaian_prestasi', 255)->nullable();
            $table->string('tanggal_kegiatan_a', 255)->nullable();
            $table->string('tanggal_kegiatan_e', 255)->nullable();
            $table->string('unggah_sertifikat', 255)->nullable();
            $table->string('unggah_surat_tugas', 255)->nullable();
            $table->string('unggah_foto', 255)->nullable();
            $table->integer('status')->default(0);
            $table->timestamp('modified')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataprestasi');
    }
};

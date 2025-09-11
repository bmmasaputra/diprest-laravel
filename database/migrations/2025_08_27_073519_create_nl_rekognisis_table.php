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
        Schema::create('nl_rekognisi', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 20);
            $table->string('kategori_kegiatan', 255);
            $table->string('nama_kegiatan', 255);
            $table->integer('tahun_kegiatan');
            $table->string('unggah_sertifikat', 255)->nullable();
            $table->string('unggah_foto', 255)->nullable();
            $table->string('unggah_surat', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->integer('status')->default(0);
            $table->timestamp('modified')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nl_rekognisi');
    }
};

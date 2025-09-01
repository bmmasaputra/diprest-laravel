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
        Schema::create('nl_pembinaan', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('nim', 20);
            $table->string('kategori_kegiatan', 255);
            $table->string('nama_kegiatan', 255);
            $table->string('tingkat_kegiatan', 255);
            $table->integer('tahun_kegiatan');
            $table->string('url', 255);
            $table->string('unggah_dokumen', 255)->nullable();
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
        Schema::dropIfExists('nl_pembinaan');
    }
};

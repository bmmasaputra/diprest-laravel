<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dataprestasi extends Model
{
    protected $table = 'dataprestasi';   // nama tabel di database
    protected $primaryKey = 'id_prestasi'; // primary key
    public $incrementing = true;

    // Otomatiskan kolom updated menggunakan 'modified' saja (tanpa created_at)
    public $timestamps = true;
    public const CREATED_AT = null;
    public const UPDATED_AT = 'modified';

    protected $fillable = [
        'nim',
        'nama_kegiatan',
        'nama_penyelenggara',
        'url',
        'kategori_kegiatan',
        'tingkat_kegiatan',
        'jumlah_asal_peserta',
        'jumlah_peserta',
        'tempat_kegiatan',
        'capaian_prestasi',
        'tanggal_kegiatan_a',
        'tanggal_kegiatan_e',
        'unggah_sertifikat',
        'unggah_surat_tugas',
        'unggah_foto',
        'status',
        'modified'
    ];
}

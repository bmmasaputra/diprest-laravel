<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nl_pembinaan extends Model
{
    // Nama tabel
    protected $table = 'nl_pembinaan';

    // Primary key bukan auto-increment (di migrasi pakai integer primary)
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;

    // Pakai kolom 'modified' sebagai updated_at, tanpa created_at
    public $timestamps = true;
    public const CREATED_AT = null;
    public const UPDATED_AT = 'modified';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'id',
        'nim',
        'kategori_kegiatan',
        'nama_kegiatan',
        'tingkat_kegiatan',
        'tahun_kegiatan',
        'url',
        'unggah_dokumen',
        'unggah_foto',
        'status',
        'modified',
    ];

    protected $casts = [
        'status'         => 'boolean',
        'modified'       => 'datetime',
    ];
}

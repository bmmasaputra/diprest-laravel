<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbkm extends Model
{
    use HasFactory;

    protected $table = 'mbkm';

    // Primary key bukan auto-increment (di migrasi pakai integer primary)
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;

    // Pakai kolom 'modified' sebagai updated_at, tanpa created_at
    public $timestamps = true;
    public const CREATED_AT = null;
    public const UPDATED_AT = 'modified';

    protected $fillable = [
        'id',
        'nim',
        'jenis',
        'nama_program',
        'level',
        'jumlah_peserta',
        'tahun_kegiatan_a',
        'tanggal_kegiatan_e',
        'tahun_kegiatan',
        'dokumen_pendukung',
        'status',
    ];

    protected $casts = [
        'status'         => 'boolean',
        'modified'       => 'datetime',
    ];
}

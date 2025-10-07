<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataOrganisasi extends Model
{
    // Nama tabel eksplisit (karena default pluralisasi Laravel berbeda)
    protected $table = 'dataorganisasi';

    // Primary key dan tipenya
    protected $primaryKey = 'id_organisasi';
    protected $keyType = 'int';
    public $incrementing = true;

    // Otomatiskan kolom updated menggunakan 'modified' saja (tanpa created_at)
    public $timestamps = true;
    public const CREATED_AT = null;
    public const UPDATED_AT = 'modified';

    // Kolom yang boleh di-mass assign
    protected $fillable = [
        'id_organisasi',
        'nim',
        'tingkat_organisasi',
        'nama_organisasi',
        'jbt_organisasi',
        'periode',
        'tanggal_kegiatan_a',
        'tanggal_kegiatan_e',
        'unggah_sk',
        'status',
    ];

    // Casting tipe data
    protected $casts = [
        'periode' => 'integer',
        'status'  => 'boolean',
        'modified' => 'datetime',
    ];
}

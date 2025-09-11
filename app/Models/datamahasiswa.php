<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class datamahasiswa extends Model
{
    protected $table = 'datamahasiswa';
    protected $primaryKey = 'nim';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'nim',
        'nama',
        'program_studi',
        'fakultas',
        'no_hp',
        'email',
        'alamat_ktp',
        'alamat_domisili',
        'hobi',
        'status',
    ];

    protected $casts = [
        'status'   => 'boolean',
        'modified' => 'datetime',
    ];
}

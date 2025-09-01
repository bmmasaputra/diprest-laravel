<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fakprodi extends Model
{
    protected $table = 'fakprodi';
    protected $primaryKey = 'id_fakprodi';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_fakprodi',
        'prodi',
        'fakultas',
    ];

}

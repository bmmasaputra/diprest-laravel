<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\HasName;

class User extends Authenticatable implements HasName
{
    use HasFactory, Notifiable;

    protected $table = 'user';       // important: must be plural
    protected $primaryKey = 'id_user';
    public $incrementing = false;     // because it's a string
    protected $keyType = 'string';
    public $timestamps = false;


    protected $fillable = [
        'id_user',
        'username',
        'password',
        'nama',
        'level',
        'fakultas',
        'program_studi',
        'foto',
        'status',
        'modified',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'status'   => 'boolean',
        'modified' => 'datetime',
    ];

    public function getFilamentName(): string
    {
        // Always return a non-empty string
        return $this->username ?: ('User ' . $this->getKey());
    }
}

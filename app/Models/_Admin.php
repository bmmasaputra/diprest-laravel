<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins'; // or your actual table name
    
    protected $fillable = ['username', 'password'];
    protected $hidden = ['password'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cards
{
    protected static $cards = [
        [
            'title' => 'Card 1',
            'value' => 1200,
            'icon' => 'trophy',
            'deskripsi' => 'bg-blue-500',
        ],
        [
            'title' => 'Card 2',
            'value' => 300,
            'icon' => 'book',
            'deskripsi' => 'bg-green-500',
        ],
        [
            'title' => 'Card 3',
            'value' => 300,
            'icon' => 'book',
            'deskripsi' => 'bg-green-500',
        ],
        [
            'title' => 'Card 4',
            'value' => 300,
            'icon' => 'book',
            'deskripsi' => 'bg-green-500',
        ],

    ];

    public static function all()
    {
        return collect(static::$cards);
    }
}

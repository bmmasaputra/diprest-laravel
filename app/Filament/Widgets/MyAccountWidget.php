<?php

namespace App\Filament\Widgets;

use Filament\Widgets\AccountWidget;

class MyAccountWidget extends AccountWidget
{
    public function getColumnSpan(): int|string|array
    {
        return [
            'sm' => 'full', // full width on small
            'lg' => 2,      // span 2 columns on large screens
        ];
    }
}
<?php

namespace App\Filament\Resources\DataRekognisis\Pages;

use App\Filament\Resources\DataRekognisis\DataRekognisiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataRekognisis extends ListRecords
{
    protected static string $resource = DataRekognisiResource::class;

    protected function getHeaderActions(): array
    {
        if (in_array(Auth::user()?->level, ['admin', 'mahasiswa'])) {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

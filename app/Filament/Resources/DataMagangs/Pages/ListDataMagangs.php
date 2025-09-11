<?php

namespace App\Filament\Resources\DataMagangs\Pages;

use App\Filament\Resources\DataMagangs\DataMagangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataMagangs extends ListRecords
{
    protected static string $resource = DataMagangResource::class;

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

<?php

namespace App\Filament\Resources\DataWirausahas\Pages;

use App\Filament\Resources\DataWirausahas\DataWirausahaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataWirausahas extends ListRecords
{
    protected static string $resource = DataWirausahaResource::class;

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

<?php

namespace App\Filament\Resources\DataProyekDesas\Pages;

use App\Filament\Resources\DataProyekDesas\DataProyekDesaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataProyekDesas extends ListRecords
{
    protected static string $resource = DataProyekDesaResource::class;

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

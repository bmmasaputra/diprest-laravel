<?php

namespace App\Filament\Resources\DataProyekIndependens\Pages;

use App\Filament\Resources\DataProyekIndependens\DataProyekIndependenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataProyekIndependens extends ListRecords
{
    protected static string $resource = DataProyekIndependenResource::class;

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

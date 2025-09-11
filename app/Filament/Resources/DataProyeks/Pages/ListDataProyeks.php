<?php

namespace App\Filament\Resources\DataProyeks\Pages;

use App\Filament\Resources\DataProyeks\DataProyekResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataProyeks extends ListRecords
{
    protected static string $resource = DataProyekResource::class;

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

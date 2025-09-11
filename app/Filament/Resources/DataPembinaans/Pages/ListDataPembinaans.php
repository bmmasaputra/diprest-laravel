<?php

namespace App\Filament\Resources\DataPembinaans\Pages;

use App\Filament\Resources\DataPembinaans\DataPembinaanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataPembinaans extends ListRecords
{
    protected static string $resource = DataPembinaanResource::class;

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

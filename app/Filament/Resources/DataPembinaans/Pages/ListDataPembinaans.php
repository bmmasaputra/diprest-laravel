<?php

namespace App\Filament\Resources\DataPembinaans\Pages;

use App\Filament\Resources\DataPembinaans\DataPembinaanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataPembinaans extends ListRecords
{
    protected static string $resource = DataPembinaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

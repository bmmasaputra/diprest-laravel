<?php

namespace App\Filament\Resources\DataRekognisis\Pages;

use App\Filament\Resources\DataRekognisis\DataRekognisiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataRekognisis extends ListRecords
{
    protected static string $resource = DataRekognisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

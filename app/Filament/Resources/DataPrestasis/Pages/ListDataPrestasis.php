<?php

namespace App\Filament\Resources\DataPrestasis\Pages;

use App\Filament\Resources\DataPrestasis\DataPrestasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataPrestasis extends ListRecords
{
    protected static string $resource = DataPrestasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

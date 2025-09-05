<?php

namespace App\Filament\Resources\DataProyekDesas\Pages;

use App\Filament\Resources\DataProyekDesas\DataProyekDesaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataProyekDesas extends ListRecords
{
    protected static string $resource = DataProyekDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

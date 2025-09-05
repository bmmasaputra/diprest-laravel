<?php

namespace App\Filament\Resources\DataProyeks\Pages;

use App\Filament\Resources\DataProyeks\DataProyekResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataProyeks extends ListRecords
{
    protected static string $resource = DataProyekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

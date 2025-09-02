<?php

namespace App\Filament\Resources\DataProyekIndependens\Pages;

use App\Filament\Resources\DataProyekIndependens\DataProyekIndependenResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataProyekIndependens extends ListRecords
{
    protected static string $resource = DataProyekIndependenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

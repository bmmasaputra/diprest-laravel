<?php

namespace App\Filament\Resources\DataMagangs\Pages;

use App\Filament\Resources\DataMagangs\DataMagangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataMagangs extends ListRecords
{
    protected static string $resource = DataMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

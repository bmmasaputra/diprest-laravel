<?php

namespace App\Filament\Resources\DataMengajars\Pages;

use App\Filament\Resources\DataMengajars\DataMengajarResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataMengajars extends ListRecords
{
    protected static string $resource = DataMengajarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

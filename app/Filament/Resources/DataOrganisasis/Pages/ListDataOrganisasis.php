<?php

namespace App\Filament\Resources\DataOrganisasis\Pages;

use App\Filament\Resources\DataOrganisasis\DataOrganisasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataOrganisasis extends ListRecords
{
    protected static string $resource = DataOrganisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DataOrganisasis\Pages;

use App\Filament\Resources\DataOrganisasis\DataOrganisasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataOrganisasi extends EditRecord
{
    protected static string $resource = DataOrganisasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DataPrestasis\Pages;

use App\Filament\Resources\DataPrestasis\DataPrestasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataPrestasi extends EditRecord
{
    protected static string $resource = DataPrestasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

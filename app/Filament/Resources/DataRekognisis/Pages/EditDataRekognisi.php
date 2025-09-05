<?php

namespace App\Filament\Resources\DataRekognisis\Pages;

use App\Filament\Resources\DataRekognisis\DataRekognisiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataRekognisi extends EditRecord
{
    protected static string $resource = DataRekognisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

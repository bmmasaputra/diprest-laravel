<?php

namespace App\Filament\Resources\DataMagangs\Pages;

use App\Filament\Resources\DataMagangs\DataMagangResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataMagang extends EditRecord
{
    protected static string $resource = DataMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DataProyekDesas\Pages;

use App\Filament\Resources\DataProyekDesas\DataProyekDesaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataProyekDesa extends EditRecord
{
    protected static string $resource = DataProyekDesaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\DataProyeks\Pages;

use App\Filament\Resources\DataProyeks\DataProyekResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataProyek extends EditRecord
{
    protected static string $resource = DataProyekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

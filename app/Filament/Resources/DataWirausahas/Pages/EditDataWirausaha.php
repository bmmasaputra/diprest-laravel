<?php

namespace App\Filament\Resources\DataWirausahas\Pages;

use App\Filament\Resources\DataWirausahas\DataWirausahaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataWirausaha extends EditRecord
{
    protected static string $resource = DataWirausahaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

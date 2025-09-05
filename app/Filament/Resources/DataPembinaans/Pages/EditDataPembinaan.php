<?php

namespace App\Filament\Resources\DataPembinaans\Pages;

use App\Filament\Resources\DataPembinaans\DataPembinaanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataPembinaan extends EditRecord
{
    protected static string $resource = DataPembinaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

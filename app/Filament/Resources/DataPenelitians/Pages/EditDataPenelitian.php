<?php

namespace App\Filament\Resources\DataPenelitians\Pages;

use App\Filament\Resources\DataPenelitians\DataPenelitianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataPenelitian extends EditRecord
{
    protected static string $resource = DataPenelitianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

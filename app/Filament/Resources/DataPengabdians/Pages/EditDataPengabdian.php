<?php

namespace App\Filament\Resources\DataPengabdians\Pages;

use App\Filament\Resources\DataPengabdians\DataPengabdianResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataPengabdian extends EditRecord
{
    protected static string $resource = DataPengabdianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

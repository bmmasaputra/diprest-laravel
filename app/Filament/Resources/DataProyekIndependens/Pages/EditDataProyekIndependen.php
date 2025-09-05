<?php

namespace App\Filament\Resources\DataProyekIndependens\Pages;

use App\Filament\Resources\DataProyekIndependens\DataProyekIndependenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataProyekIndependen extends EditRecord
{
    protected static string $resource = DataProyekIndependenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

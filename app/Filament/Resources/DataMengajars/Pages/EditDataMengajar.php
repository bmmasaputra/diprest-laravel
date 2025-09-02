<?php

namespace App\Filament\Resources\DataMengajars\Pages;

use App\Filament\Resources\DataMengajars\DataMengajarResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataMengajar extends EditRecord
{
    protected static string $resource = DataMengajarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

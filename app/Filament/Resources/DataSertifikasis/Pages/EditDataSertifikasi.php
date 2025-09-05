<?php

namespace App\Filament\Resources\DataSertifikasis\Pages;

use App\Filament\Resources\DataSertifikasis\DataSertifikasiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataSertifikasi extends EditRecord
{
    protected static string $resource = DataSertifikasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

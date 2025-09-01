<?php

namespace App\Filament\Resources\DataMahasiswas\Pages;

use App\Filament\Resources\DataMahasiswas\DataMahasiswaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDataMahasiswa extends EditRecord
{
    protected static string $resource = DataMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

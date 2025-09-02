<?php

namespace App\Filament\Resources\PertukaranMahasiswas\Pages;

use App\Filament\Resources\PertukaranMahasiswas\PertukaranMahasiswaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPertukaranMahasiswa extends EditRecord
{
    protected static string $resource = PertukaranMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\PertukaranMahasiswas\Pages;

use App\Filament\Resources\PertukaranMahasiswas\PertukaranMahasiswaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPertukaranMahasiswas extends ListRecords
{
    protected static string $resource = PertukaranMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

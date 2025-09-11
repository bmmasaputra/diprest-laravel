<?php

namespace App\Filament\Resources\DataSertifikasis\Pages;

use App\Filament\Resources\DataSertifikasis\DataSertifikasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataSertifikasis extends ListRecords
{
    protected static string $resource = DataSertifikasiResource::class;

    protected function getHeaderActions(): array
    {
        if (in_array(Auth::user()?->level, ['admin', 'mahasiswa'])) {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

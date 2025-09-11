<?php

namespace App\Filament\Resources\PertukaranMahasiswas\Pages;

use App\Filament\Resources\PertukaranMahasiswas\PertukaranMahasiswaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListPertukaranMahasiswas extends ListRecords
{
    protected static string $resource = PertukaranMahasiswaResource::class;

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

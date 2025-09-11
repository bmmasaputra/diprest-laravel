<?php

namespace App\Filament\Resources\DataOrganisasis\Pages;

use App\Filament\Resources\DataOrganisasis\DataOrganisasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataOrganisasis extends ListRecords
{
    protected static string $resource = DataOrganisasiResource::class;

    protected function getHeaderActions(): array
    {
        // Hanya admin yang bisa create
        if (in_array(Auth::user()?->level, ['admin', 'mahasiswa'])) {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

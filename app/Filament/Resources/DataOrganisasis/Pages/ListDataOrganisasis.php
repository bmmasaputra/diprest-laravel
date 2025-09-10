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
        if (Auth::user()?->level === 'admin') {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

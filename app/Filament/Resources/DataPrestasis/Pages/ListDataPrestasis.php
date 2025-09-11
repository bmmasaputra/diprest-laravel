<?php

namespace App\Filament\Resources\DataPrestasis\Pages;

use App\Filament\Resources\DataPrestasis\DataPrestasiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataPrestasis extends ListRecords
{
    protected static string $resource = DataPrestasiResource::class;

    protected function getHeaderActions(): array
    {
        // Hanya admin yang bisa create
        if (Auth::user()?->level === 'admin' || Auth::user()?->level === 'mahasiswa') {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

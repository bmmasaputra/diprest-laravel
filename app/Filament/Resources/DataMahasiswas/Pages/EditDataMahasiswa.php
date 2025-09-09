<?php

namespace App\Filament\Resources\DataMahasiswas\Pages;

use App\Filament\Resources\DataMahasiswas\DataMahasiswaResource;
use Filament\Actions\DeleteAction;
use Filament\Facades\Filament;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditDataMahasiswa extends EditRecord
{
    protected static string $resource = DataMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        $user = Auth::user();
        $panel = Filament::getCurrentPanel(); // pakai Facade, bukan helper kosong

        // Kalau panel mahasiswa, sembunyikan delete
        if ($panel && $panel->getId() === 'mahasiswaPanel' && $user?->level === 'mahasiswa') {
            return [];
        }

        return [
            DeleteAction::make(),
        ];
    }
}

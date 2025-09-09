<?php

namespace App\Filament\Resources\DataMahasiswas\Pages;

use App\Filament\Resources\DataMahasiswas\DataMahasiswaResource;
use App\Models\DataMahasiswa;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataMahasiswas extends ListRecords
{
    protected static string $resource = DataMahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        // Hanya admin yang bisa create
        if (Auth::user()?->level === 'admin') {
            return [
                \Filament\Actions\CreateAction::make(),
            ];
        }

        return [];
    }

    public function mount(): void
    {
        parent::mount();

        $user = Auth::user();

        if ($user && $user->level === 'mahasiswa') {
            $record = DataMahasiswa::where('nim', $user->username)->first();

            if ($record) {
                // Jangan return, langsung lakukan redirect
                $this->redirect(
                    DataMahasiswaResource::getUrl('edit', ['record' => $record])
                );
            }
        }
    }
}

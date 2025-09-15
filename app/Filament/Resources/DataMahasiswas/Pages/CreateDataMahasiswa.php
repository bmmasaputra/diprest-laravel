<?php

namespace App\Filament\Resources\DataMahasiswas\Pages;

use App\Filament\Resources\DataMahasiswas\DataMahasiswaResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateDataMahasiswa extends CreateRecord
{
    protected static string $resource = DataMahasiswaResource::class;

    protected function afterCreate(): void
    {
        // Insert into users table
        User::create([
            'id_user'       => $this->record->nim, // NIM becomes user ID
            'username'      => $this->record->nim, // NIM as username
            'password'      => Hash::make($this->record->nim), // hash NIM as password
            'nama'          => $this->record->nama,
            'level'         => 'mahasiswa',
            'fakultas'      => $this->record->fakultas,
            'program_studi' => $this->record->program_studi,
        ]);
    }
}

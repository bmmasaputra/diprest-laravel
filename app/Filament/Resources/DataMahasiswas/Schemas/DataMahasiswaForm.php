<?php

namespace App\Filament\Resources\DataMahasiswas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\fakprodi;

class DataMahasiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->maxLength(20),

                TextInput::make('nama')
                    ->label('Nama Mahasiswa')
                    ->required()
                    ->maxLength(100),

                Select::make('fakultas')
                    ->label('Fakultas')
                    ->required()
                    ->options(
                        fakprodi::query()
                            ->distinct()
                            ->pluck('fakultas', 'fakultas')
                            ->toArray()
                    )
                    ->reactive(),

                Select::make('program_studi')
                    ->label('Program Studi')
                    ->required()
                    ->options(function (callable $get) {
                        $fakultas = $get('fakultas');

                        if (! $fakultas) {
                            return [];
                        }

                        return fakprodi::query()
                            ->where('fakultas', $fakultas)
                            ->pluck('prodi', 'prodi')
                            ->toArray();
                    })
                    ->reactive()
                    ->disabled(fn(callable $get) => blank($get('fakultas'))),

                TextInput::make('no_hp')
                    ->label('No HP')
                    ->required()
                    ->maxLength(100),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(100),

                TextInput::make('alamat_ktp')
                    ->label('Alamat KTP')
                    ->required()
                    ->maxLength(100),

                TextInput::make('alamat_domisili')
                    ->label('Alamat Domisili')
                    ->required()
                    ->maxLength(100),

                TextInput::make('hobi')
                    ->label('Hobi')
                    ->maxLength(100),

            ]);
    }
}

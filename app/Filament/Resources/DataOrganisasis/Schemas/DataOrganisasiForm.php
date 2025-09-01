<?php

namespace App\Filament\Resources\DataOrganisasis\Schemas;

use Faker\Core\File;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use App\Models\DataMahasiswa;

class DataOrganisasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('nim')
                    ->label('Nama Mahasiswa')
                    ->searchable()
                    ->options(
                        DataMahasiswa::all()->pluck(
                            fn($mhs) => "{$mhs->nama} ({$mhs->nim})", // label: nama (nim)
                            'nim' // value: nim
                        )
                    )
                    ->required(),
                TextInput::make('tingkat_organisasi')
                    ->label('Tingkat Organisasi')
                    ->required(),
                TextInput::make('nama_organisasi')
                    ->label('Nama Organisasi')
                    ->required(),
                TextInput::make('jbt_organisasi')
                    ->label('Jabatan Organisasi')
                    ->required(),
                Select::make('periode')
                    ->label('Periode')
                    ->required()
                    ->options(
                        array_combine(
                            range(date('Y'), date('Y') - 7),
                            range(date('Y'), date('Y') - 7)
                        )
                    ),
                FileUpload::make('unggah_sk')
                    ->label('Unggah SK')
                    ->disk('public')
                    ->directory('sk_organisasi')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
            ]);
    }
}

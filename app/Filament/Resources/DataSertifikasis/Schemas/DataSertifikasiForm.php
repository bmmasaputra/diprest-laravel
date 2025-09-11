<?php

namespace App\Filament\Resources\DataSertifikasis\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use App\Models\datamahasiswa;

class DataSertifikasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Pilih mahasiswa
                Select::make('nim')
                    ->label('Nama Mahasiswa')
                    ->searchable()
                    ->options(
                        DataMahasiswa::all()->pluck(
                            fn($mhs) => "{$mhs->nama} ({$mhs->nim})", // label: nama (nim)
                            'nim' // value: nim
                        )
                    )
                    ->default(fn() => \Illuminate\Support\Facades\Auth::user()?->level === 'mahasiswa' ? \Illuminate\Support\Facades\Auth::user()->username : null)
                    ->required(),

                // Nama skema sertifikasi
                TextInput::make('nama_skema_sertifikasi')
                    ->label('Nama Skema sertifikasi')
                    ->required()
                    ->maxLength(255),

                // Tingkat kegiatan
                Select::make('tingkat_kegiatan')
                    ->label('Tingkat Kegiatan')
                    ->options([
                        'Kabupaten' => 'Kabupaten',
                        'Nasional' => 'Nasional',
                        'Internasional' => 'Internasional',
                    ])
                    ->required(),

                // Tahun kegiatan
                Select::make('tahun_kegiatan')
                    ->label('Tahun Kegiatan')
                    ->options([
                        '2018' => '2018',
                        '2019' => '2019',
                        '2020' => '2020',
                        '2021' => '2021',
                        '2022' => '2022',
                        '2023' => '2023',
                        '2024' => '2024',
                        '2025' => '2025',
                    ])
                    ->required(),

                // Dosen pendamping (opsional)
                TextInput::make('dosen_pendamping')
                    ->label('Dosen Pendamping')
                    ->maxLength(255),

                // Upload file sertifikat
                FileUpload::make('file_sertifikat')
                    ->label('Unggah Sertifikat')
                    ->disk('public')
                    ->directory('sertifikat')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(false),
            ]);
    }
}

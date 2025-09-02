<?php

namespace App\Filament\Resources\DataPrestasis\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use App\Models\DataMahasiswa;

class DataPrestasiForm
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
                TextInput::make('nama_kegiatan')
                    ->label('Nama Kegiatan')
                    ->required(),
                TextInput::make('nama_penyelenggara')
                    ->label('Nama Penyelenggara')
                    ->required(),
                TextInput::make('url')
                    ->label('URL')
                    ->required(),
                TextInput::make('kategori_kegiatan')
                    ->label('Kategori Kegiatan')
                    ->required(),
                select::make('tingkat_kegiatan')
                    ->label('Tingkat Kegiatan')
                    ->options([
                        'TINGKAT INTERNASIONAL' => 'TINGKAT INTERNASIONAL',
                        'TINGKAT NASIONAL'      => 'TINGKAT NASIONAL',
                        'TINGKAT PROVINSI'      => 'TINGKAT PROVINSI',
                        'TINGKAT KABUPATEN'     => 'TINGKAT KABUPATEN',
                    ])
                    ->required(),
                TextInput::make('jumlah_asal_peserta')
                    ->label('Jumlah Asal Peserta')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('jumlah_peserta')
                    ->label('Jumlah Peserta')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('tempat_kegiatan')
                    ->label('Tempat Kegiatan')
                    ->required(),
                Select::make('capaian_prestasi')
                    ->label('Capaian Prestasi')
                    ->options([
                        'JUARA 1' => 'Juara 1',
                        'JUARA 2' => 'Juara 2',
                        'JUARA 3' => 'Juara 3',
                        'HARAPAN' => 'HARAPAN',
                        'FINALIS' => 'Finalis',
                    ])
                    ->required(),

                DateTimePicker::make('tanggal_kegiatan_a')
                    ->label('Tanggal Kegiatan Dimulai')
                    ->required(),

                DateTimePicker::make('tanggal_kegiatan_e')
                    ->label('Tanggal Kegiatan Berakhir')
                    ->required(),

                FileUpload::make('unggah_sertifikat')
                    ->label('Unggah Sertifikat')
                    ->disk('public')
                    ->directory('sk_sertifikat')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),

                FileUpload::make('unggah_surat_tugas')
                    ->label('Unggah Surat Tugas')
                    ->disk('public')
                    ->directory('sk_surat_tugas')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),

                FileUpload::make('unggah_foto')
                    ->label('Unggah Foto')
                    ->disk('public')
                    ->directory('sk_foto')
                    ->acceptedFileTypes([
                        'image/jpg',
                        'image/jpeg',
                        'image/png',
                        'image/gif',
                        'image/bmp',
                        'image/tiff',
                    ])
                    ->required(),
            ]);
    }
}

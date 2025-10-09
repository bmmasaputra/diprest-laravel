<?php

namespace App\Filament\Resources\DataPrestasis\Schemas;

use Filament\Forms\Components\DatePicker;
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
                    ->default(fn() => \Illuminate\Support\Facades\Auth::user()?->level === 'mahasiswa' ? \Illuminate\Support\Facades\Auth::user()->username : null)
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
                        'INTERNASIONAL' => 'Tingkat Internasional',
                        'NASIONAL'      => 'Tingkat Nasional',
                        'PROVINSI'      => 'Tingkat Provinsi',
                        'KABUPATEN'     => 'Tingkat Kabupaten',
                    ])
                    ->required(),
                TextInput::make('jumlah_asal_peserta')
                    ->label('Jumlah Universitas Peserta')
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

                DatePicker::make('tanggal_kegiatan_a')
                    ->label('Tanggal Kegiatan Dimulai')
                    ->required(),

                DatePicker::make('tanggal_kegiatan_e')
                    ->label('Tanggal Kegiatan Berakhir')
                    ->required(),

                FileUpload::make('unggah_sertifikat')
                    ->label('Unggah Sertifikat (maksimal 1 MB)')
                    ->disk('public')
                    ->directory('sk_sertifikat')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(1024) // 1024 KB = 1 MB
                    ->required()
                    ->helperText('Sertifikat wajib diunggah pada bagian ini dalam format PDF.')
                    ->validationMessages([
                        'maxSize' => 'Ukuran file tidak boleh lebih dari 1 MB.',
                        'acceptedFileTypes' => 'Hanya file PDF yang diperbolehkan.',
                        'required' => 'File Sertifikat wajib diunggah.',
                    ]),

                FileUpload::make('unggah_surat_tugas')
                    ->label('Unggah Surat Tugas (maksimal 1 MB)')
                    ->disk('public')
                    ->directory('sk_surat_tugas')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(1024) // 1024 KB = 1 MB
                    ->required()
                    ->helperText('Surat Tugas wajib diunggah pada bagian ini dalam format PDF.')
                    ->validationMessages([
                        'maxSize' => 'Ukuran file tidak boleh lebih dari 1 MB.',
                        'acceptedFileTypes' => 'Hanya file PDF yang diperbolehkan.',
                        'required' => 'File Surat Tugas wajib diunggah.',
                    ]),

                FileUpload::make('unggah_foto')
                    ->label('Unggah Foto (maksimal 1 MB)')
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
                    ->maxSize(1024) // 1024 KB = 1 MB 
                    ->required()
                    ->helperText('Foto wajib diupload pada bagian ini.')
                    ->validationMessages([
                        'maxSize' => 'Ukuran file tidak boleh lebih dari 1 MB.',
                        'acceptedFileTypes' => 'Hanya file gambar yang diperbolehkan.',
                        'required' => 'File wajib diunggah.',
                    ]),
            ]);
    }
}

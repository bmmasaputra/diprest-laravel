<?php

namespace App\Filament\Resources\DataPembinaans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use App\Models\datamahasiswa;
use App\Models\fakprodi;


class DataPembinaanForm
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

                Select::make('kategori_kegiatan')
                    ->label('Kategori Kegiatan')
                    ->options([
                        'Pelatihan Kepemimpinan Mahasiswa' => 'Pelatihan Kepemimpinan Mahasiswa',
                        'Pelatihan militer/kewiraan/wawasan nusantara' => 'Pelatihan militer/kewiraan/wawasan nusantara',
                        'Pendidikan norma, etika, pembinaan karakter, dan soft skills mahasiswa' => 'Pendidikan norma, etika, pembinaan karakter, dan soft skills mahasiswa',
                        'Pendidikan atau gerakan anti korupsi' => 'Pendidikan atau gerakan anti korupsi',
                        'Pendidikan atau gerakan anti penyalahgunaan NAPZA' => 'Pendidikan atau gerakan anti penyalahgunaan NAPZA',
                        'Pendidikan atau gerakan anti radikalisme' => 'Pendidikan atau gerakan anti radikalisme',
                        'Kampanye pencegahan kekerasan seksual dan Perundungan (bullying)' => 'Kampanye pencegahan kekerasan seksual dan Perundungan (bullying)',
                        'Kampanye kampus sehat dan/atau green kampus' => 'Kampanye kampus sehat dan/atau green kampus',
                    ])
                    ->required(),

                Select::make('tingkat_kegiatan')
                    ->label('Tingkat Kegiatan')
                    ->options([
                        'Bekerja sama dengan Stakeholder diluar Perguruan Tinggi' => 'Bekerja sama dengan Stakeholder diluar Perguruan Tinggi',
                        'Lingkungan Perguruan Tinggi' => 'Lingkungan Perguruan Tinggi',
                        'Lingkungan Fakultas' => 'Lingkungan Fakultas',
                        'Lingkungan Himpunan Mahasiswa' => 'Lingkungan Himpunan Mahasiswa',
                    ])
                    ->required(),

                TextInput::make('nama_kegiatan')
                    ->label('Nama Kegiatan')
                    ->required()
                    ->maxLength(255),

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

                TextInput::make('url')
                    ->label('URL')
                    ->required(),

                FileUpload::make('unggah_dokumen')
                    ->label('Unggah Surat Tugas')
                    ->disk('public')
                    ->directory('sk_surat_reko')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),

                FileUpload::make('unggah_foto')
                    ->label('Unggah Foto')
                    ->disk('public')
                    ->directory('sk_foto_reko')
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

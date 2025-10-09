<?php

namespace App\Filament\Resources\DataPembinaans\Schemas;

use Filament\Forms\Components\DatePicker;
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
                    ->default(fn() => \Illuminate\Support\Facades\Auth::user()?->level === 'mahasiswa' ? \Illuminate\Support\Facades\Auth::user()->username : null)
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

                DatePicker::make('tanggal_kegiatan_a')
                    ->label('Tanggal Kegiatan Dimulai')
                    ->required(),
                DatePicker::make('tanggal_kegiatan_e')
                    ->label('Tanggal Kegiatan Berakhir')
                    ->required(),

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
                        '2026' => '2026',
                        '2027' => '2027',
                        '2028' => '2028',
                        '2029' => '2029',
                        '2030' => '2030',
                    ])
                    ->required(),

                TextInput::make('url')
                    ->label('URL')
                    ->required(),

                FileUpload::make('unggah_dokumen')
                    ->label('Unggah Surat Tugas (maksimal 1 MB)')
                    ->disk('public')
                    ->directory('sk_surat_reko')
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
                    ->directory('sk_foto_reko')
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

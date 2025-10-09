<?php

namespace App\Filament\Resources\DataRekognisis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use App\Models\datamahasiswa;
use App\Models\fakprodi;

class DataRekognisiForm
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
                        'Paten' => 'Pendaftaran Paten',
                        'Cipta/Buku'      => 'Hak Cipta/Buku',
                        'Penilai'      => 'Juri/Pelatih/Wasit',
                        'MC'     => 'Pemakalah/Speaker/Conference/Seminar',
                        'Seni' => 'Peserta Pamerenan Karya Seni',
                        'Pencipta lagu' => 'Karya cipta lagu yang telah dipublikasikan/rekaman/diakui',
                        'Seni tari' => 'Karya cipta seni tari yang telah dipentaskan/didokumentasikan',
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

                FileUpload::make('unggah_sertifikat')
                    ->label('Unggah Sertifikat (maksimal 1 MB)')
                    ->disk('public')
                    ->directory('sk_sertifikat_reko')
                    ->acceptedFileTypes(['application/pdf'])
                    ->maxSize(1024) // 1024 KB = 1 MB
                    ->required()
                    ->helperText('Sertifikat wajib diunggah pada bagian ini dalam format PDF.')
                    ->validationMessages([
                        'maxSize' => 'Ukuran file tidak boleh lebih dari 1 MB.',
                        'acceptedFileTypes' => 'Hanya file PDF yang diperbolehkan.',
                        'required' => 'File Sertifikat wajib diunggah.',
                    ]),


                FileUpload::make('unggah_surat')
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

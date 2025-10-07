<?php

namespace App\Filament\Resources\DataMagangs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use App\Models\datamahasiswa;

class DataMagangForm
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
                Hidden::make('jenis')
                    ->default('magang')
                    ->required(),
                TextInput::make('nama_program')
                    ->label('Nama Program Magang')
                    ->required(),
                Select::make('level')
                    ->label('Level')
                    ->options([
                        'Internasional' => 'Tingkat Internasional',
                        'Nasional'      => 'Tingkat Nasional',
                        'Provinsi'      => 'Tingkat Provinsi',
                        'Kabupaten'     => 'Tingkat Kabupaten',
                    ])
                    ->required(),
                TextInput::make('jumlah_peserta')
                    ->label('Jumlah Peserta')
                    ->numeric()
                    ->required(),
                DatePicker::make('tanggal_kegiatan_a')
                    ->label('Tanggal Kegiatan Dimulai')
                    ->required(),
                DatePicker::make('tanggal_kegiatan_e')
                    ->label('Tanggal Kegiatan Berakhir')
                    ->required(),
                Select::make('tahun_kegiatan')
                    ->label('Tahun Kegiatan')
                    ->options(
                        array_combine(
                            range(date('Y'), date('Y') - 10),
                            range(date('Y'), date('Y') - 10)
                        )
                    )
                    ->required(),
                FileUpload::make('dokumen_pendukung')
                    ->label('Unggah Dokumen Pendukung (PDF)')
                    ->disk('public')
                    ->directory('mbkm/dokumen_magang')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
            ]);
    }
}

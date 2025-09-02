<?php

namespace App\Filament\Resources\DataWirausahas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use App\Models\datamahasiswa;

class DataWirausahaForm
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
                Hidden::make('jenis')
                    ->default('data_mengajar')
                    ->required(),
                TextInput::make('nama_program')
                    ->label('Program Wirausaha')
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
                    ->directory('mbkm/dokumen_data_wirausaha')
                    ->acceptedFileTypes(['application/pdf'])
                    ->required(),
            ]);
    }
}

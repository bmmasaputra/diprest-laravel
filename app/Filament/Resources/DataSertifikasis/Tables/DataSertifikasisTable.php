<?php

namespace App\Filament\Resources\DataSertifikasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataSertifikasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),

                TextColumn::make('nama_skema_sertifikasi')
                    ->label('Nama Skema sertifikasi')
                    ->searchable(),

                TextColumn::make('tingkat_kegiatan')
                    ->label('Tingkat Kegiatan')
                    ->searchable(),

                TextColumn::make('tahun_kegiatan')
                    ->label('Tahun Kegiatan')
                    ->sortable(),

                TextColumn::make('dosen_pendamping')
                    ->label('Dosen Pendamping')
                    ->searchable(),

                TextColumn::make('file_sertifikat')
                    ->label('File Sertifikat')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '-';
                        // Buat URL publik ke file
                        return '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-green-700 underline">Lihat File</a>';
                    })
                    ->html(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

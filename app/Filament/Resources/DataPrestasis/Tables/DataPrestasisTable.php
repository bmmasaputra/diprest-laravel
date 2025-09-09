<?php

namespace App\Filament\Resources\DataPrestasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class DataPrestasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),
                TextColumn::make('nama_kegiatan')
                    ->searchable(),
                TextColumn::make('nama_penyelenggara')
                    ->searchable(),
                TextColumn::make('url')
                    ->searchable(),
                TextColumn::make('kategori_kegiatan')
                    ->searchable(),
                TextColumn::make('tingkat_kegiatan')
                    ->searchable(),
                TextColumn::make('jumlah_asal_peserta')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jumlah_peserta')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tempat_kegiatan')
                    ->searchable(),
                TextColumn::make('capaian_prestasi')
                    ->searchable(),
                TextColumn::make('tanggal_kegiatan_a')
                    ->searchable(),
                TextColumn::make('tanggal_kegiatan_e')
                    ->searchable(),
                TextColumn::make('unggah_sertifikat')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '-';
                        // Buat URL publik ke file
                        return '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-green-700 underline">Lihat File</a>';
                    })
                    ->html(),
                TextColumn::make('unggah_surat_tugas')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '-';
                        // Buat URL publik ke file
                        return '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-green-700 underline">Lihat File</a>';
                    })
                    ->html(),
                TextColumn::make('unggah_foto')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '-';
                        // Buat URL publik ke file
                        return '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-green-700 underline">Lihat File</a>';
                    })
                    ->html(),
                TextColumn::make('status')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('modified')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->visible(fn() => Auth::user()?->level === 'admin'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn() => Auth::user()?->level === 'admin'),
                ]),
            ]);
    }
}

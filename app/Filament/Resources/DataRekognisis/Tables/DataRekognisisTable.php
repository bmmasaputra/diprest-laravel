<?php

namespace App\Filament\Resources\DataRekognisis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class DataRekognisisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('NIM')
                    ->searchable(),
                TextColumn::make('kategori_kegiatan')
                    ->searchable(),
                TextColumn::make('nama_kegiatan')
                    ->searchable(),
                TextColumn::make('tahun_kegiatan')
                    ->searchable(),
                TextColumn::make('unggah_sertifikat')
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
                TextColumn::make('unggah_surat')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '-';
                        // Buat URL publik ke file
                        return '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-green-700 underline">Lihat File</a>';
                    })
                    ->html(),
                    TextColumn::make('url')
                    ->searchable(),
                TextColumn::make('status')
                    ->numeric()
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

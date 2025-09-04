<?php

namespace App\Filament\Resources\DataPembinaans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataPembinaansTable
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
                TextColumn::make('tingkat_kegiatan')
                    ->searchable(),
                TextColumn::make('tahun_kegiatan')
                    ->searchable(),
                TextColumn::make('url')
                    ->searchable(),
                TextColumn::make('unggah_dokumen')
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

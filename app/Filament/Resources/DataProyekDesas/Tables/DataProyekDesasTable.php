<?php

namespace App\Filament\Resources\DataProyekDesas\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class DataProyekDesasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('Nama Mahasiswa')
                    ->sortable(),
                TextColumn::make('jenis')
                    ->label('Jenis')
                    ->sortable(),
                TextColumn::make('nama_program')
                    ->label('Program Proyek Desa')
                    ->sortable(),
                TextColumn::make('level')
                    ->label('Level')
                    ->sortable(),
                TextColumn::make('jumlah_peserta')
                    ->label('Jumlah Peserta')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tahun_kegiatan')
                    ->label('Tahun Kegiatan')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('dokumen_pendukung')
                    ->label('Dokumen Pendukung')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '-';
                        // Buat URL publik ke file
                        return '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-green-700 underline">Lihat File</a>';
                    })
                    ->html(),
                TextColumn::make('modified')
                    ->label('Modified')
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

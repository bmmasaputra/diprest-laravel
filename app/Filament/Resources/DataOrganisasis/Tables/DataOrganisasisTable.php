<?php

namespace App\Filament\Resources\DataOrganisasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DataOrganisasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_organisasi')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nim')
                    ->searchable(),
                TextColumn::make('tingkat_organisasi')
                    ->searchable(),
                TextColumn::make('nama_organisasi')
                    ->searchable(),
                TextColumn::make('jbt_organisasi')
                    ->searchable(),
                TextColumn::make('periode')
                    ->sortable(),
                TextColumn::make('unggah_sk')
                    ->label('Unggah SK')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return '-';
                        // Buat URL publik ke file
                        return '<a href="' . asset('storage/' . $state) . '" target="_blank" class="text-green-700 underline">Lihat File</a>';
                    })
                    ->html(),
                TextColumn::make('status')
                    ->sortable(),
                TextColumn::make('modified')
                    ->dateTime()
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

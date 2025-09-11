<?php

namespace App\Filament\Resources\DataMahasiswas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use App\Models\DataMahasiswa;
use Illuminate\Support\Facades\Auth;

class DataMahasiswasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('NIM')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nama')
                    ->label('Nama Mahasiswa')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('fakultas')
                    ->label('Fakultas')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('program_studi')
                    ->label('Program Studi')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('fakultas')
                    ->label('Filter Fakultas')
                    ->options(
                        DataMahasiswa::query()
                            ->distinct()
                            ->pluck('fakultas', 'fakultas')
                            ->toArray()
                    ),
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

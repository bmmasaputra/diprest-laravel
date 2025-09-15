<?php

namespace App\Filament\Resources\DataPrestasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
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
                TextColumn::make('mahasiswa_nama')
                    ->label('Nama mahasiswa')
                    ->getStateUsing(function ($record) {
                        $mhs = \App\Models\DataMahasiswa::where('nim', $record->nim)->first();
                        return $mhs ? $mhs->nama : '-';
                    }),
                TextColumn::make('mahasiswa_fakultas')
                    ->label('Fakultas')
                    ->getStateUsing(function ($record) {
                        $mhs = \App\Models\DataMahasiswa::where('nim', $record->nim)->first();
                        return $mhs ? $mhs->fakultas : '-';
                    }),
                TextColumn::make('mahasiswa_program_studi')
                    ->label('Program studi')
                    ->getStateUsing(function ($record) {
                        $mhs = \App\Models\DataMahasiswa::where('nim', $record->nim)->first();
                        return $mhs ? $mhs->program_studi : '-';
                    }),
                TextColumn::make('nama_kegiatan')
                    ->searchable(),
                TextColumn::make('nama_penyelenggara')
                    ->searchable(),
                TextColumn::make('url')
                    ->label('Laman lomba')
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
                    ->label('Tanggal kegiatan dimulai')
                    ->searchable(),
                TextColumn::make('tanggal_kegiatan_e')
                    ->label('Tanggal kegiatan berakhir')
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
                \Filament\Tables\Columns\IconColumn::make('status')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->modifyQueryUsing(function ($query) {
                $user = \Illuminate\Support\Facades\Auth::user();
                if ($user && $user->level === 'mahasiswa') {
                    $query->where('nim', $user->username);
                }
            })
            ->recordActions([
                EditAction::make()
                    ->visible(fn() => in_array(Auth::user()?->level, ['admin', 'mahasiswa'])),
                Action::make('verifikasi')
                    ->label(fn($record) => $record->status == 1 ? 'Undo' : 'Verifikasi')
                    ->icon(fn($record) => $record->status == 1 ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn($record) => $record->status == 1 ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'status' => $record->status == 1 ? 0 : 1,
                        ]);
                    })
                    ->visible(fn() => in_array(Auth::user()?->level, ['admin', 'operator']))
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->visible(fn() => Auth::user()?->level === 'admin'),
                ]),
            ]);
    }
}

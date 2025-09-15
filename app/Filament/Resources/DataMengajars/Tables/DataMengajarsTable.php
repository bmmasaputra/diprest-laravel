<?php

namespace App\Filament\Resources\DataMengajars\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class DataMengajarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('Nama Mahasiswa')
                    ->sortable(),
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
                TextColumn::make('jenis')
                    ->label('Jenis')
                    ->sortable(),
                TextColumn::make('nama_program')
                    ->label('Program Mengajar')
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
            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();
                if (! $user) {
                    return;
                }

                // Mahasiswa: hanya data miliknya sendiri (nim = username)
                if ($user->level === 'mahasiswa') {
                    $query->where($query->getModel()->getTable() . '.nim', $user->username);
                    return;
                }

                // Operator: hanya data dengan fakultas yang sama
                if ($user->level === 'operator') {
                    $table = $query->getModel()->getTable();

                    if ($table === 'datamahasiswa') {
                        // Jika resource berbasis DataMahasiswa
                        $query->where('fakultas', $user->fakultas);
                    } else {
                        // Jika resource berbasis model lain (mis. DataMagang) yang punya kolom 'nim'
                        // Filter berdasarkan fakultas dari tabel datamahasiswa (tanpa join agar aman)
                        $query->whereIn("$table.nim", function ($sub) use ($user) {
                            $sub->from('datamahasiswa')
                                ->select('nim')
                                ->where('fakultas', $user->fakultas);
                        });
                    }

                    return;
                }

                // Admin / role lain: biarkan melihat semua data (tanpa filter)
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

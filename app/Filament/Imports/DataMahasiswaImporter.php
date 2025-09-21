<?php

namespace App\Filament\Imports;

use App\Models\DataMahasiswa;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class DataMahasiswaImporter extends Importer
{
    protected static ?string $model = DataMahasiswa::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama')
                ->requiredMapping()
                ->rules(['required', 'max:150']),
            ImportColumn::make('program_studi')
                ->rules(['max:255']),
            ImportColumn::make('fakultas')
                ->rules(['max:255']),
            ImportColumn::make('no_hp')
                ->rules(['max:20']),
            ImportColumn::make('email')
                ->rules(['email', 'max:100']),
            ImportColumn::make('alamat_ktp')
                ->rules(['max:255']),
            ImportColumn::make('alamat_domisili')
                ->rules(['max:255']),
            ImportColumn::make('hobi')
                ->rules(['max:255']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
        ];
    }

    public function resolveRecord(): DataMahasiswa
    {
        return new DataMahasiswa();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your data mahasiswa import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

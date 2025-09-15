<?php

namespace App\Filament\Imports;

use App\Models\mbkm;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class DataMagangImporter extends Importer
{
    protected static ?string $model = mbkm::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nim')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('jenis')
                ->rules(['max:255']),
            ImportColumn::make('nama_program')
                ->rules(['max:255']),
            ImportColumn::make('level')
                ->rules(['max:255']),
            ImportColumn::make('jumlah_peserta')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('tahun_kegiatan')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('dokumen_pendukung')
                ->rules(['max:255']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('modified')
                ->requiredMapping()
                ->rules(['required', 'datetime']),
        ];
    }

    public function resolveRecord(): mbkm
    {
        return new mbkm();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your data magang import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

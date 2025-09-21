<?php

namespace App\Filament\Imports;

use App\Models\nl_pembinaan as NlPembinaan;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class NlPembinaanImporter extends Importer
{
    protected static ?string $model = NlPembinaan::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nim')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('kategori_kegiatan')
                ->rules(['max:255']),
            ImportColumn::make('nama_kegiatan')
                ->rules(['max:255']),
            ImportColumn::make('tingkat_kegiatan')
                ->rules(['max:255']),
            ImportColumn::make('tahun_kegiatan')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('url')
                ->rules(['max:255']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
        ];
    }

    public function resolveRecord(): NlPembinaan
    {
        return new NlPembinaan();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your nl pembinaan import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

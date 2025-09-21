<?php

namespace App\Filament\Imports;

use App\Models\nl_sertifikasi as NlSertifikasi;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class NlSertifikasiImporter extends Importer
{
    protected static ?string $model = NlSertifikasi::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nim')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('nama_skema_sertifikasi')
                ->rules(['max:255']),
            ImportColumn::make('tingkat_kegiatan')
                ->rules(['max:255']),
            ImportColumn::make('tahun_kegiatan')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('dosen_pendamping')
                ->rules(['max:255']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
        ];
    }

    public function resolveRecord(): NlSertifikasi
    {
        return new NlSertifikasi();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your nl sertifikasi import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

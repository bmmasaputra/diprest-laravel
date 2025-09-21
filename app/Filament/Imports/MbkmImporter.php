<?php

namespace App\Filament\Imports;

use App\Models\Mbkm;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class MbkmImporter extends Importer
{
    protected static ?string $model = Mbkm::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nim')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('nama_program')
                ->rules(['max:255']),
            ImportColumn::make('level')
                ->rules(['max:255']),
            ImportColumn::make('jumlah_peserta')
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('tahun_kegiatan')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
        ];
    }

    public function resolveRecord(): ?Mbkm
    {
        // Set 'jenis' dari opsi action; fallback boleh 'magang'
        $jenis = $this->options['jenis'] ?? 'magang';

        // Jika ingin selalu membuat baris baru:
        return new Mbkm(['jenis' => $jenis]);
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your mbkm import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

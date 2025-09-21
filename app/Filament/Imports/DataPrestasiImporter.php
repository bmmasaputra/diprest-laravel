<?php

namespace App\Filament\Imports;

use App\Models\DataPrestasi;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class DataPrestasiImporter extends Importer
{
    protected static ?string $model = DataPrestasi::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nim')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('nama_kegiatan')
                ->rules(['max:255']),
            ImportColumn::make('nama_penyelenggara')
                ->rules(['max:255']),
            ImportColumn::make('url')
                ->rules(['max:255']),
            ImportColumn::make('kategori_kegiatan')
                ->rules(['max:255']),
            ImportColumn::make('tingkat_kegiatan')
                ->rules(['max:20']),
            ImportColumn::make('jumlah_asal_peserta')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('jumlah_peserta')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('tempat_kegiatan')
                ->rules(['max:255']),
            ImportColumn::make('capaian_prestasi')
                ->rules(['max:255']),
            ImportColumn::make('tanggal_kegiatan_a')
                ->rules(['required', 'date_format:Y-m-d']),
            ImportColumn::make('tanggal_kegiatan_e')
                ->rules(['required', 'date_format:Y-m-d']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
        ];
    }

    public function resolveRecord(): DataPrestasi
    {
        return new DataPrestasi();
    }

    // Opsional: set default nilai kolom yang tidak ada di CSV
    public function mutateBeforeCreate(array $data): array
    {
        $data['status'] = $data['status'] ?? 0;
        return $data;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your data prestasi import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

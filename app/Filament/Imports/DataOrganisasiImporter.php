<?php

namespace App\Filament\Imports;

use App\Models\DataOrganisasi;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class DataOrganisasiImporter extends Importer
{
    protected static ?string $model = DataOrganisasi::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nim')
                ->requiredMapping()
                ->rules(['required', 'max:20']),
            ImportColumn::make('tingkat_organisasi')
                ->rules(['max:255']),
            ImportColumn::make('nama_organisasi')
                ->rules(['max:255']),
            ImportColumn::make('jbt_organisasi')
                ->rules(['max:255']),
            ImportColumn::make('periode')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
        ];
    }

    public function resolveRecord(): DataOrganisasi
    {
        return new DataOrganisasi();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your data organisasi import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}

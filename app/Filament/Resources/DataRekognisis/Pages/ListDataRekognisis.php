<?php

namespace App\Filament\Resources\DataRekognisis\Pages;

use App\Filament\Resources\DataRekognisis\DataRekognisiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use Filament\Actions\ImportAction;
use App\Filament\Imports\NlRekognisiImporter;

class ListDataRekognisis extends ListRecords
{
    protected static string $resource = DataRekognisiResource::class;

    protected function getHeaderActions(): array
    {
        // Mahasiswa hanya bisa membuat data baru
        if (Auth::user()?->level === 'mahasiswa') {
            return [
                CreateAction::make(),
            ];
        }

        if (Auth::user()?->level === 'admin') {
            return [
                CreateAction::make(),
                ImportAction::make('import-magang')
                    ->label('Import CSV')
                    ->color('primary')
                    ->importer(NlRekognisiImporter::class),
                ExportAction::make()
                    ->exports([
                        ExcelExport::make()
                            ->fromTable()
                            ->withFilename(fn($resource) => $resource::getModelLabel() . '-' . date('Y-m-d-H-i-s'))
                            ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                            ->withColumns([
                                Column::make('modified'),
                            ])
                            ->ignoreFormatting(['tahun_kegiatan']),
                    ]),
            ];
        }

        return [
            ExportAction::make()
                ->exports([
                    ExcelExport::make()
                        ->fromTable()
                        ->withFilename(fn($resource) => $resource::getModelLabel() . '-' . date('Y-m-d-H-i-s'))
                        ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                        ->withColumns([
                            Column::make('modified'),
                        ])
                        ->ignoreFormatting(['tahun_kegiatan']),
                ]),
        ];
    }
}

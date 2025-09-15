<?php

namespace App\Filament\Resources\DataMahasiswas\Pages;

use App\Filament\Resources\DataMahasiswas\DataMahasiswaResource;
use App\Models\DataMahasiswa;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Filament\Actions\CreateAction;
use pxlrbt\FilamentExcel\Columns\Column;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use Filament\Actions\ImportAction;
use App\Filament\Imports\DataMahasiswaImporter;

class ListDataMahasiswas extends ListRecords
{
    protected static string $resource = DataMahasiswaResource::class;

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
                ImportAction::make()
                    ->label('Import CSV')
                    ->color('primary')
                    ->importer(DataMahasiswaImporter::class),
                ExportAction::make()
                    ->exports([
                        ExcelExport::make()
                            ->fromTable()
                            ->withFilename(fn($resource) => $resource::getModelLabel() . '-' . date('Y-m-d-H-i-s'))
                            ->withWriterType(\Maatwebsite\Excel\Excel::XLSX)
                            ->withColumns([
                                Column::make('modified'),
                            ]),
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
                        ]),
                ]),
        ];
    }

    public function mount(): void
    {
        parent::mount();

        $user = Auth::user();

        if ($user && $user->level === 'mahasiswa') {
            $record = DataMahasiswa::where('nim', $user->username)->first();

            if ($record) {
                // Jangan return, langsung lakukan redirect
                $this->redirect(
                    DataMahasiswaResource::getUrl('edit', ['record' => $record])
                );
            }
        }
    }
}

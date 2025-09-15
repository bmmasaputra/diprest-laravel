<?php

namespace App\Filament\Resources\DataMengajars\Pages;

use App\Filament\Resources\DataMengajars\DataMengajarResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataMengajars extends ListRecords
{
    protected static string $resource = DataMengajarResource::class;

    protected function getHeaderActions(): array
    {
        if (in_array(Auth::user()?->level, ['admin', 'mahasiswa'])) {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

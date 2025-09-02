<?php

namespace App\Filament\Resources\DataPengabdians\Pages;

use App\Filament\Resources\DataPengabdians\DataPengabdianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataPengabdians extends ListRecords
{
    protected static string $resource = DataPengabdianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

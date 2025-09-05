<?php

namespace App\Filament\Resources\DataPenelitians\Pages;

use App\Filament\Resources\DataPenelitians\DataPenelitianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDataPenelitians extends ListRecords
{
    protected static string $resource = DataPenelitianResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

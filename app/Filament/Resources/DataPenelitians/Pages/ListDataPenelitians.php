<?php

namespace App\Filament\Resources\DataPenelitians\Pages;

use App\Filament\Resources\DataPenelitians\DataPenelitianResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListDataPenelitians extends ListRecords
{
    protected static string $resource = DataPenelitianResource::class;

    protected function getHeaderActions(): array
    {
        if (Auth::user()?->level === 'admin') {
            return [
                CreateAction::make(),
            ];
        }

        return [];
    }
}

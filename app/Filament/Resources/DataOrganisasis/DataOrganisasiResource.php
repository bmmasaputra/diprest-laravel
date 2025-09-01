<?php

namespace App\Filament\Resources\DataOrganisasis;

use App\Filament\Resources\DataOrganisasis\Pages\CreateDataOrganisasi;
use App\Filament\Resources\DataOrganisasis\Pages\EditDataOrganisasi;
use App\Filament\Resources\DataOrganisasis\Pages\ListDataOrganisasis;
use App\Filament\Resources\DataOrganisasis\Schemas\DataOrganisasiForm;
use App\Filament\Resources\DataOrganisasis\Tables\DataOrganisasisTable;
use App\Models\DataOrganisasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataOrganisasiResource extends Resource
{
    protected static ?string $model = DataOrganisasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_organisasi';

    public static function form(Schema $schema): Schema
    {
        return DataOrganisasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataOrganisasisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataOrganisasis::route('/'),
            'create' => CreateDataOrganisasi::route('/create'),
            'edit' => EditDataOrganisasi::route('/{record}/edit'),
        ];
    }
}

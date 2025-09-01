<?php

namespace App\Filament\Resources\DataMahasiswas;

use App\Filament\Resources\DataMahasiswas\Pages\CreateDataMahasiswa;
use App\Filament\Resources\DataMahasiswas\Pages\EditDataMahasiswa;
use App\Filament\Resources\DataMahasiswas\Pages\ListDataMahasiswas;
use App\Filament\Resources\DataMahasiswas\Schemas\DataMahasiswaForm;
use App\Filament\Resources\DataMahasiswas\Tables\DataMahasiswasTable;
use App\Models\DataMahasiswa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DataMahasiswaResource extends Resource
{
    protected static ?string $model = DataMahasiswa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return DataMahasiswaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataMahasiswasTable::configure($table);
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
            'index' => ListDataMahasiswas::route('/'),
            'create' => CreateDataMahasiswa::route('/create'),
            'edit' => EditDataMahasiswa::route('/{record}/edit'),
        ];
    }
}

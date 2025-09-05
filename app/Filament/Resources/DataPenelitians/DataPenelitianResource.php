<?php

namespace App\Filament\Resources\DataPenelitians;

use App\Filament\Resources\DataPenelitians\Pages\CreateDataPenelitian;
use App\Filament\Resources\DataPenelitians\Pages\EditDataPenelitian;
use App\Filament\Resources\DataPenelitians\Pages\ListDataPenelitians;
use App\Filament\Resources\DataPenelitians\Schemas\DataPenelitianForm;
use App\Filament\Resources\DataPenelitians\Tables\DataPenelitiansTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\mbkm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DataPenelitianResource extends Resource
{
    protected static ?string $model = mbkm::class;

    protected static string | UnitEnum | null $navigationGroup = 'MBKM';

    protected static ?string $label = 'Data Penelitian';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataPenelitianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPenelitiansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('jenis', 'pertukaran_mahasiswa');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataPenelitians::route('/'),
            'create' => CreateDataPenelitian::route('/create'),
            'edit' => EditDataPenelitian::route('/{record}/edit'),
        ];
    }
}

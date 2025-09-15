<?php

namespace App\Filament\Resources\DataWirausahas;

use App\Filament\Resources\DataWirausahas\Pages\CreateDataWirausaha;
use App\Filament\Resources\DataWirausahas\Pages\EditDataWirausaha;
use App\Filament\Resources\DataWirausahas\Pages\ListDataWirausahas;
use App\Filament\Resources\DataWirausahas\Schemas\DataWirausahaForm;
use App\Filament\Resources\DataWirausahas\Tables\DataWirausahasTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\mbkm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataWirausahaResource extends Resource
{
    protected static ?string $model = mbkm::class;

    protected static string | UnitEnum | null $navigationGroup = 'MBKM';

    protected static ?string $label = 'Data Wirausaha';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataWirausahaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataWirausahasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('jenis', 'wirausaha');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataWirausahas::route('/'),
            'create' => CreateDataWirausaha::route('/create'),
            'edit' => EditDataWirausaha::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return in_array(Auth::user()?->level, ['admin', 'mahasiswa', 'operator']);
    }

    public static function canCreate(): bool
    {
        return in_array(Auth::user()?->level, ['admin', 'mahasiswa']);
    }

    public static function canEdit($record): bool
    {
        return in_array(Auth::user()?->level, ['admin', 'mahasiswa']);
    }

    public static function canDelete($record): bool
    {
        return in_array(Auth::user()?->level, ['admin', 'mahasiswa']);
    }

    public static function canForceDelete($record): bool
    {
        return Auth::user()?->level === 'admin';
    }

    public static function canRestore($record): bool
    {
        return Auth::user()?->level === 'admin';
    }
}

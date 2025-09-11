<?php

namespace App\Filament\Resources\DataMagangs;

use App\Filament\Resources\DataMagangs\Pages\CreateDataMagang;
use App\Filament\Resources\DataMagangs\Pages\EditDataMagang;
use App\Filament\Resources\DataMagangs\Pages\ListDataMagangs;
use App\Filament\Resources\DataMagangs\Schemas\DataMagangForm;
use App\Filament\Resources\DataMagangs\Tables\DataMagangsTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\mbkm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataMagangResource extends Resource
{
    protected static ?string $model = mbkm::class;

    protected static string | UnitEnum | null $navigationGroup = 'MBKM';

    protected static ?string $label = 'Data Magang';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataMagangForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataMagangsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('jenis', 'magang');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataMagangs::route('/'),
            'create' => CreateDataMagang::route('/create'),
            'edit' => EditDataMagang::route('/{record}/edit'),
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

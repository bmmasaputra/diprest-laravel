<?php

namespace App\Filament\Resources\DataProyekIndependens;

use App\Filament\Resources\DataProyekIndependens\Pages\CreateDataProyekIndependen;
use App\Filament\Resources\DataProyekIndependens\Pages\EditDataProyekIndependen;
use App\Filament\Resources\DataProyekIndependens\Pages\ListDataProyekIndependens;
use App\Filament\Resources\DataProyekIndependens\Schemas\DataProyekIndependenForm;
use App\Filament\Resources\DataProyekIndependens\Tables\DataProyekIndependensTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\mbkm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataProyekIndependenResource extends Resource
{
    protected static ?string $model = mbkm::class;

    protected static string | UnitEnum | null $navigationGroup = 'MBKM';

    protected static ?string $label = 'Data Studi Independen';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataProyekIndependenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataProyekIndependensTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('jenis', 'studi_pi');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataProyekIndependens::route('/'),
            'create' => CreateDataProyekIndependen::route('/create'),
            'edit' => EditDataProyekIndependen::route('/{record}/edit'),
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
        return Auth::user()?->level === 'admin';
    }

    public static function canDelete($record): bool
    {
        return Auth::user()?->level === 'admin';
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

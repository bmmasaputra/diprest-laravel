<?php

namespace App\Filament\Resources\DataProyeks;

use App\Filament\Resources\DataProyeks\Pages\CreateDataProyek;
use App\Filament\Resources\DataProyeks\Pages\EditDataProyek;
use App\Filament\Resources\DataProyeks\Pages\ListDataProyeks;
use App\Filament\Resources\DataProyeks\Schemas\DataProyekForm;
use App\Filament\Resources\DataProyeks\Tables\DataProyeksTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\mbkm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataProyekResource extends Resource
{
    protected static ?string $model = mbkm::class;

    protected static string | UnitEnum | null $navigationGroup = 'MBKM';

    protected static ?string $label = 'Data Proyek Kemanusiaan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataProyekForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataProyeksTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('jenis', 'proyek_kemanusiaan');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataProyeks::route('/'),
            'create' => CreateDataProyek::route('/create'),
            'edit' => EditDataProyek::route('/{record}/edit'),
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

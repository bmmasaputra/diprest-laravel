<?php

namespace App\Filament\Resources\DataProyekDesas;

use App\Filament\Resources\DataProyekDesas\Pages\CreateDataProyekDesa;
use App\Filament\Resources\DataProyekDesas\Pages\EditDataProyekDesa;
use App\Filament\Resources\DataProyekDesas\Pages\ListDataProyekDesas;
use App\Filament\Resources\DataProyekDesas\Schemas\DataProyekDesaForm;
use App\Filament\Resources\DataProyekDesas\Tables\DataProyekDesasTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\mbkm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataProyekDesaResource extends Resource
{
    protected static ?string $model = mbkm::class;

    protected static string | UnitEnum | null $navigationGroup = 'MBKM';

    protected static ?string $label = 'Data Proyek Desa';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataProyekDesaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataProyekDesasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('jenis', 'proyek_desa');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataProyekDesas::route('/'),
            'create' => CreateDataProyekDesa::route('/create'),
            'edit' => EditDataProyekDesa::route('/{record}/edit'),
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

<?php

namespace App\Filament\Resources\DataPembinaans;

use App\Filament\Resources\DataPembinaans\Pages\CreateDataPembinaan;
use App\Filament\Resources\DataPembinaans\Pages\EditDataPembinaan;
use App\Filament\Resources\DataPembinaans\Pages\ListDataPembinaans;
use App\Filament\Resources\DataPembinaans\Schemas\DataPembinaanForm;
use App\Filament\Resources\DataPembinaans\Tables\DataPembinaansTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\nl_pembinaan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataPembinaanResource extends Resource
{
    protected static ?string $model = nl_pembinaan::class;

    protected static string | UnitEnum | null $navigationGroup = 'Non Lomba';

    protected static ?string $label = 'Data Pembinaan';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataPembinaanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPembinaansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPluralLabel(): ?string
    {
        return "Data Pembinaan";
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataPembinaans::route('/'),
            'create' => CreateDataPembinaan::route('/create'),
            'edit' => EditDataPembinaan::route('/{record}/edit'),
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

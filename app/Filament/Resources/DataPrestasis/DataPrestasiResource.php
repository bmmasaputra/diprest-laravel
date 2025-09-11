<?php

namespace App\Filament\Resources\DataPrestasis;

use App\Filament\Resources\DataPrestasis\Pages\CreateDataPrestasi;
use App\Filament\Resources\DataPrestasis\Pages\EditDataPrestasi;
use App\Filament\Resources\DataPrestasis\Pages\ListDataPrestasis;
use App\Filament\Resources\DataPrestasis\Schemas\DataPrestasiForm;
use App\Filament\Resources\DataPrestasis\Tables\DataPrestasisTable;
use App\Models\DataPrestasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class DataPrestasiResource extends Resource
{
    protected static ?string $model = DataPrestasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nim';

    public static function form(Schema $schema): Schema
    {
        return DataPrestasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPrestasisTable::configure($table);
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
            'index' => ListDataPrestasis::route('/'),
            'create' => CreateDataPrestasi::route('/create'),
            'edit' => EditDataPrestasi::route('/{record}/edit'),
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

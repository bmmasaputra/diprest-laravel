<?php

namespace App\Filament\Resources\DataRekognisis;

use App\Filament\Resources\DataRekognisis\Pages\CreateDataRekognisi;
use App\Filament\Resources\DataRekognisis\Pages\EditDataRekognisi;
use App\Filament\Resources\DataRekognisis\Pages\ListDataRekognisis;
use App\Filament\Resources\DataRekognisis\Schemas\DataRekognisiForm;
use App\Filament\Resources\DataRekognisis\Tables\DataRekognisisTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\nl_rekognisi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataRekognisiResource extends Resource
{
    protected static ?string $model = nl_rekognisi::class;

    protected static string | UnitEnum | null $navigationGroup = 'Non Lomba';

    protected static ?string $label = 'Data Rekognisi';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataRekognisiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataRekognisisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPluralLabel(): ?string
    {
        return "Data Rekognisi";
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataRekognisis::route('/'),
            'create' => CreateDataRekognisi::route('/create'),
            'edit' => EditDataRekognisi::route('/{record}/edit'),
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

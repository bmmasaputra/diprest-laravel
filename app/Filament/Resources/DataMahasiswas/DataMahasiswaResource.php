<?php

namespace App\Filament\Resources\DataMahasiswas;

use App\Filament\Resources\DataMahasiswas\Pages\CreateDataMahasiswa;
use App\Filament\Resources\DataMahasiswas\Pages\EditDataMahasiswa;
use App\Filament\Resources\DataMahasiswas\Pages\ListDataMahasiswas;
use App\Filament\Resources\DataMahasiswas\Schemas\DataMahasiswaForm;
use App\Filament\Resources\DataMahasiswas\Tables\DataMahasiswasTable;
use App\Models\DataMahasiswa;
use BackedEnum;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class DataMahasiswaResource extends Resource
{
    protected static ?string $model = DataMahasiswa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nim';

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
        $panel = Filament::getCurrentPanel();

        if ($panel && $panel->getId() === 'mahasiswaPanel') {
            return [
                'index' => Pages\ListDataMahasiswas::route('/'),
                'edit' => Pages\EditDataMahasiswa::route('/'),
            ];
        }

        // Default (admin panel)
        return [
            'index' => Pages\ListDataMahasiswas::route('/'),
            'create' => Pages\CreateDataMahasiswa::route('/create'),
            'edit' => Pages\EditDataMahasiswa::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return in_array(Auth::user()?->level, ['admin', 'mahasiswa', 'operator']);
    }

    public static function canCreate(): bool
    {
        return Auth::user()?->level === 'admin';
    }

    public static function canEdit($record): bool
    {
        return in_array(Auth::user()?->level, ['admin', 'mahasiswa']);
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

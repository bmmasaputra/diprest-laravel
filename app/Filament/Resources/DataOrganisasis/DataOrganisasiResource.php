<?php

namespace App\Filament\Resources\DataOrganisasis;

use App\Filament\Resources\DataOrganisasis\Pages\CreateDataOrganisasi;
use App\Filament\Resources\DataOrganisasis\Pages\EditDataOrganisasi;
use App\Filament\Resources\DataOrganisasis\Pages\ListDataOrganisasis;
use App\Filament\Resources\DataOrganisasis\Schemas\DataOrganisasiForm;
use App\Filament\Resources\DataOrganisasis\Tables\DataOrganisasisTable;
use App\Models\DataOrganisasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;


class DataOrganisasiResource extends Resource
{
    protected static ?string $model = DataOrganisasi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_organisasi';

    public static function form(Schema $schema): Schema
    {
        return DataOrganisasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataOrganisasisTable::configure($table);
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
            'index' => ListDataOrganisasis::route('/'),
            'create' => CreateDataOrganisasi::route('/create'),
            'edit' => EditDataOrganisasi::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return in_array(Auth::user()?->level, ['admin', 'mahasiswa']);
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

    public static function shouldRegisterNavigation(): bool
    {
        $user = Auth::user();

        if (! $user) {
            return false;
        }

        // Kalau panel mahasiswa
        if (filament()->getCurrentPanel()->getId() === 'mahasiswaPanel') {
            return $user->level === 'mahasiswa';
        }

        // Kalau panel admin
        if (filament()->getCurrentPanel()->getId() === 'admin') {
            return $user->level === 'admin';
        }

        return false;
    }
}

<?php

namespace App\Filament\Resources\PertukaranMahasiswas;

use App\Filament\Resources\PertukaranMahasiswas\Pages\CreatePertukaranMahasiswa;
use App\Filament\Resources\PertukaranMahasiswas\Pages\EditPertukaranMahasiswa;
use App\Filament\Resources\PertukaranMahasiswas\Pages\ListPertukaranMahasiswas;
use App\Filament\Resources\PertukaranMahasiswas\Schemas\PertukaranMahasiswaForm;
use App\Filament\Resources\PertukaranMahasiswas\Tables\PertukaranMahasiswasTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\mbkm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class PertukaranMahasiswaResource extends Resource
{
    protected static ?string $model = mbkm::class;

    protected static string | UnitEnum | null $navigationGroup = 'MBKM';

    protected static ?string $label = 'Data Pertukaran Mahasiswa';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return PertukaranMahasiswaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PertukaranMahasiswasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('jenis', 'pertukaran_mahasiswa');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPertukaranMahasiswas::route('/'),
            'create' => CreatePertukaranMahasiswa::route('/create'),
            'edit' => EditPertukaranMahasiswa::route('/{record}/edit'),
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

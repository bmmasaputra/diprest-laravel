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

    protected static ?string $label = 'Data Proyek Independen';

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
        return parent::getEloquentQuery()->where('jenis', 'pertukaran_mahasiswa');
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

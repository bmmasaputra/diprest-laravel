<?php

namespace App\Filament\Resources\DataPengabdians;

use App\Filament\Resources\DataPengabdians\Pages\CreateDataPengabdian;
use App\Filament\Resources\DataPengabdians\Pages\EditDataPengabdian;
use App\Filament\Resources\DataPengabdians\Pages\ListDataPengabdians;
use App\Filament\Resources\DataPengabdians\Schemas\DataPengabdianForm;
use App\Filament\Resources\DataPengabdians\Tables\DataPengabdiansTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\mbkm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataPengabdianResource extends Resource
{
    protected static ?string $model = mbkm::class;

    protected static string | UnitEnum | null $navigationGroup = 'MBKM';

    protected static ?string $label = 'Data Pengabdian ke Masyarakat';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataPengabdianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataPengabdiansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPluralLabel(): ?string
    {
        return "Data Pengabdian ke Masyarakat";
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('jenis', 'pengabdian');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataPengabdians::route('/'),
            'create' => CreateDataPengabdian::route('/create'),
            'edit' => EditDataPengabdian::route('/{record}/edit'),
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

<?php

namespace App\Filament\Resources\DataSertifikasis;

use App\Filament\Resources\DataSertifikasis\Pages\CreateDataSertifikasi;
use App\Filament\Resources\DataSertifikasis\Pages\EditDataSertifikasi;
use App\Filament\Resources\DataSertifikasis\Pages\ListDataSertifikasis;
use App\Filament\Resources\DataSertifikasis\Schemas\DataSertifikasiForm;
use App\Filament\Resources\DataSertifikasis\Tables\DataSertifikasisTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\nl_sertifikasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataSertifikasiResource extends Resource
{
    protected static ?string $model = nl_sertifikasi::class;

    protected static string | UnitEnum | null $navigationGroup = 'Non Lomba';

    protected static ?string $label = 'Data Sertifikasi';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_skema_sertifikasi';

    public static function form(Schema $schema): Schema
    {
        return DataSertifikasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataSertifikasisTable::configure($table);
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
            'index' => ListDataSertifikasis::route('/'),
            'create' => CreateDataSertifikasi::route('/create'),
            'edit' => EditDataSertifikasi::route('/{record}/edit'),
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

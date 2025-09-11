<?php

namespace App\Filament\Resources\DataMengajars;

use App\Filament\Resources\DataMengajars\Pages\CreateDataMengajar;
use App\Filament\Resources\DataMengajars\Pages\EditDataMengajar;
use App\Filament\Resources\DataMengajars\Pages\ListDataMengajars;
use App\Filament\Resources\DataMengajars\Schemas\DataMengajarForm;
use App\Filament\Resources\DataMengajars\Tables\DataMengajarsTable;
use Illuminate\Database\Eloquent\Builder;
use App\Models\mbkm;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use UnitEnum;

class DataMengajarResource extends Resource
{
    protected static ?string $model = mbkm::class;

    protected static string | UnitEnum | null $navigationGroup = 'MBKM';

    protected static ?string $label = 'Data Mengajar';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_program';

    public static function form(Schema $schema): Schema
    {
        return DataMengajarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DataMengajarsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('jenis', 'mengajar');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDataMengajars::route('/'),
            'create' => CreateDataMengajar::route('/create'),
            'edit' => EditDataMengajar::route('/{record}/edit'),
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

<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
// use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\DashboardWidget;
use App\Filament\Widgets\MyAccountWidget;
use App\Filament\Resources\DataPrestasis\DataPrestasiResource;
use App\Filament\Resources\DataOrganisasis\DataOrganisasiResource;
use App\Filament\Resources\DataMahasiswas\DataMahasiswaResource;
use App\Filament\Resources\DataMagangs\DataMagangResource;
use App\Filament\Resources\DataMengajars\DataMengajarResource;
use App\Filament\Resources\DataPenelitians\DataPenelitianResource;
use App\Filament\Resources\DataPengabdians\DataPengabdianResource;
use App\Filament\Resources\DataProyekDesas\DataProyekDesaResource;
use App\Filament\Resources\DataProyekIndependens\DataProyekIndependenResource;
use App\Filament\Resources\DataProyeks\DataProyekResource;
use App\Filament\Resources\DataWirausahas\DataWirausahaResource;
use App\Filament\Resources\PertukaranMahasiswas\PertukaranMahasiswaResource;
use App\Filament\Resources\DataPembinaans\DataPembinaanResource;
use App\Filament\Resources\DataRekognisis\DataRekognisiResource;
use App\Filament\Resources\DataSertifikasis\DataSertifikasiResource;
use App\Filament\Resources\ChangePasswords\ChangePasswordResource;
use Filament\Facades\Filament;
use Filament\Actions\Action;

class MahasiswaPanelPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('mahasiswaPanel')
            ->brandLogo(asset('image/logo-filament.png'))
            ->darkModeBrandLogo(asset('image/logo-filament-dark.png'))
            ->brandLogoHeight('2rem')
            ->path('mahasiswaPanel')
            ->globalSearch(false)
            ->authGuard('web')
            ->colors([
                'primary' => Color::Green,
            ])
            ->resources([
                DataMahasiswaResource::class,
                DataPrestasiResource::class,
                DataOrganisasiResource::class,
                DataMagangResource::class,
                DataMengajarResource::class,
                DataPenelitianResource::class,
                DataPengabdianResource::class,
                DataProyekDesaResource::class,
                DataProyekIndependenResource::class,
                DataProyekResource::class,
                DataWirausahaResource::class,
                PertukaranMahasiswaResource::class,
                DataPembinaanResource::class,
                DataRekognisiResource::class,
                DataSertifikasiResource::class,
                ChangePasswordResource::class,
            ])
            ->discoverPages(in: app_path('Filament/MahasiswaPanel/Pages'), for: 'App\Filament\MahasiswaPanel\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/MahasiswaPanel/Widgets'), for: 'App\Filament\MahasiswaPanel\Widgets')
            ->widgets([
                MyAccountWidget::class,
                DashboardWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->userMenuItems([
                Action::make('changePassword')
                    ->label('Ubah Password')
                    ->icon('heroicon-o-key')
                    ->url(fn() => ChangePasswordResource::getUrl(panel: Filament::getCurrentPanel()->getId())),
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

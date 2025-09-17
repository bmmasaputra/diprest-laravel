<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use app\filament\Resources\DataMahasiswas\DataMahasiswaResource;
use app\filament\Resources\DataPrestasis\DataPrestasiResource;
use app\filament\Resources\DataOrganisasis\DataOrganisasiResource;
use app\filament\Resources\DataMagangs\DataMagangResource;
use app\filament\Resources\DataMengajars\DataMengajarResource;
use app\filament\Resources\DataPenelitians\DataPenelitianResource;
use app\filament\Resources\DataPengabdians\DataPengabdianResource;
use app\filament\Resources\DataProyekDesas\DataProyekDesaResource;
use app\filament\Resources\DataProyekIndependens\DataProyekIndependenResource;
use app\filament\Resources\DataProyeks\DataProyekResource;
use app\filament\Resources\DataWirausahas\DataWirausahaResource;
use app\filament\Resources\PertukaranMahasiswas\PertukaranMahasiswaResource;
use app\filament\Resources\DataPembinaans\DataPembinaanResource;
use app\filament\Resources\DataRekognisis\DataRekognisiResource;
use app\filament\Resources\DataSertifikasis\DataSertifikasiResource;

class DashboardWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            // AccountWidget::class,
            Stat::make('Data Mahasiswa', '100k')
                ->url(DataMahasiswaResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Organisasi', '100k')
                ->url(DataOrganisasiResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Prestasi', '100k')
                ->url(DataPrestasiResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Magang', '100k')
                ->url(DataMagangResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Mengajar', '100k')
                ->url(DataMengajarResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Penelitian', '100k')
                ->url(DataPenelitianResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Pengabdian Masyarakat', '100k')
                ->url(DataPengabdianResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Proyek Desa', '100k')
                ->url(DataProyekDesaResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Studi Independen', '100k')
                ->url(DataProyekIndependenResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Proyek Kemanusiaan', '100k')
                ->url(DataProyekResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Wirausaha', '100k')
                ->url(DataWirausahaResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Pertukaran Mahasiswa', '100k')
                ->url(PertukaranMahasiswaResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Pembinaan', '100k')
                ->url(DataPembinaanResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Rekognisi', '100k')
                ->url(DataRekognisiResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Sertifikasi', '100k')
                ->url(DataSertifikasiResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
        ];
    }
}

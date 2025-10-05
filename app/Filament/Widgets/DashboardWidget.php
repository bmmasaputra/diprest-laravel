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
use App\Models\datamahasiswa;
use App\Models\dataprestasi;
use App\Models\dataorganisasi;
use App\Models\mbkm;
use App\Models\nl_rekognisi;
use App\Models\nl_sertifikasi;
use App\Models\nl_pembinaan;

class DashboardWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {

        // Fungsi untuk format angka (1.2k, 3.4M, dst)
        $formatNumber = function ($number) {
            if ($number >= 1000000) {
                return round($number / 1000000, 1) . 'M';
            } elseif ($number >= 1000) {
                return round($number / 1000, 1) . 'k';
            }
            return $number;
        };

        return [

            // AccountWidget::class,
            Stat::make('Data Mahasiswa', $formatNumber(DataMahasiswa::count()))
                ->url(DataMahasiswaResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Organisasi', $formatNumber(dataorganisasi::count()))
                ->url(DataOrganisasiResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Prestasi', $formatNumber(dataprestasi::count()))
                ->url(DataPrestasiResource::getUrl())
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Magang', $formatNumber(mbkm::where('jenis', 'magang')->count()))
                ->url(DataMagangResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Mengajar', $formatNumber(mbkm::where('jenis', 'mengajar')->count()))
                ->url(DataMengajarResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Penelitian', $formatNumber(mbkm::where('jenis', 'penelitian')->count()))
                ->url(DataPenelitianResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Pengabdian Masyarakat', $formatNumber(mbkm::where('jenis', 'pengabdian')->count()))
                ->url(DataPengabdianResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Proyek Desa', $formatNumber(mbkm::where('jenis', 'proyek_desa')->count()))
                ->url(DataProyekDesaResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Studi Independen', $formatNumber(mbkm::where('jenis', 'studi_pi')->count()))
                ->url(DataProyekIndependenResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Proyek Kemanusiaan', $formatNumber(mbkm::where('jenis', 'proyek_kemanusiaan')->count()))
                ->url(DataProyekResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Wirausaha', $formatNumber(mbkm::where('jenis', 'wirausaha')->count()))
                ->url(DataWirausahaResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Pertukaran Mahasiswa', $formatNumber(mbkm::where('jenis', 'pertukaran_mahasiswa')->count()))
                ->url(PertukaranMahasiswaResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Pembinaan', $formatNumber(nl_pembinaan::count()))
                ->url(DataPembinaanResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Rekognisi', $formatNumber(nl_rekognisi::count()))
                ->url(DataRekognisiResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Sertifikasi', $formatNumber(nl_sertifikasi::count()))
                ->url(DataSertifikasiResource::getUrl()) // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
        ];
    }
}

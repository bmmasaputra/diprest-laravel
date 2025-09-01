<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            // AccountWidget::class,
            Stat::make('Data Mahasiswa', '100k')
                -> url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Prestasi', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Organisasi', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Pertukaran Mahasiswa', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Magang / Kerja Praktik', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Mengajar di Sekolah', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Penelitian', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Proyek Kemanusiaan', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Proyek Desa', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Wirausaha', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Studi Independen', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Pengabdian Masyarakat', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Rekognisi', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Pembinaan Kebangsaan', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
            Stat::make('Data Kegiatan Sertifikasi', '100k')
                ->url('/') // ← your target route
                ->icon('heroicon-m-arrow-right-circle'),
        ];
    }
}

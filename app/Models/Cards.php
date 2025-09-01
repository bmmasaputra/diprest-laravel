<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cards
{
    protected static $cards = [
        [
            'title' => 'Data Prestasi',
            'value' => 1200,
            'icon' => 'trophy',
            'deskripsi' => 'Biodata Mahasiswa Berprestasi selama Menempuh Pendidikan di Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Organisasi',
            'value' => 300,
            'icon' => 'organisasi',
            'deskripsi' => 'Biodata Keaktifan Mahasiswa dalam Organisasi di Lingkup Jurusan, Fakultas, dan Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Pertukaran Mahasiswa',
            'value' => 300,
            'icon' => 'book',
            'deskripsi' => 'Data Kegiatan Pertukaran Mahasiswa di Lingkup Nasional maupun Internasional pada Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Magang',
            'value' => 300,
            'icon' => 'magang',
            'deskripsi' => 'Data Magang Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Mengajar',
            'value' => 300,
            'icon' => 'mengajar',
            'deskripsi' => 'Data Mengajar Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Penelitian',
            'value' => 300,
            'icon' => 'penelitian',
            'deskripsi' => 'Data Penelitian Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Proyek Kemanusiaan',
            'value' => 300,
            'icon' => 'proyek-kemanusiaan',
            'deskripsi' => 'Data Proyek Kemanusiaan Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Proyek',
            'value' => 300,
            'icon' => 'proyek-desa',
            'deskripsi' => 'Data Proyek Desa Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Wirausaha',
            'value' => 300,
            'icon' => 'wirausaha',
            'deskripsi' => 'Data Wirausaha Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Studi Proyek Independen',
            'value' => 300,
            'icon' => 'studi-proyek-independen',
            'deskripsi' => 'Data Studi Proyek Independen Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Pengabdian',
            'value' => 300,
            'icon' => 'pengabdian',
            'deskripsi' => 'Data Pengabdian Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Rekognisi',
            'value' => 300,
            'icon' => 'rekognisi',
            'deskripsi' => 'Data Rekognisi Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Pembinaan Mental Kebangsaan',
            'value' => 300,
            'icon' => 'pembinaan-mental-kebangsaan',
            'deskripsi' => 'Data Pembinaan Mental Kebangsaan Universitas Palangka Raya',
        ],
        [
            'title' => 'Data Sertifikasi',
            'value' => 300,
            'icon' => 'sertifikasi',
            'deskripsi' => 'Data Sertifikasi Universitas Palangka Raya',
        ],

    ];

    public static function all()
    {
        return collect(static::$cards);
    }
}

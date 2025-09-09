<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'id_user' => '223020503060',
            'username' => '223020503060',
            'password' => Hash::make('223020503060'),
            'nama' => 'Bima Agung Saputra',
            'level' => 'mahasiswa',
            'fakultas' => 'Teknik',
            'program_studi' => 'Teknik Informatika',
        ]);
    }
}

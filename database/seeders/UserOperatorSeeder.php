<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'id_user' => 'OO102',
                'username' => 'Operator FKIP',
                'password' => Hash::make('diprest102'),
                'nama' => 'Operator FKIP',
                'level' => 'operator',
                'fakultas' => 'KEGURUAN DAN ILMU PENDIDIKAN',
                'program_studi' => null,
            ],
            [
                'id_user' => 'OO103',
                'username' => 'Operator FEB',
                'password' => Hash::make('diprest103'),
                'nama' => 'Operator FEB',
                'level' => 'operator',
                'fakultas' => 'EKONOMI DAN BISNIS',
                'program_studi' => null,
            ],
            [
                'id_user' => 'OO104',
                'username' => 'Operator FAPERTA',
                'password' => Hash::make('diprest104'),
                'nama' => 'Operator FAPERTA',
                'level' => 'operator',
                'fakultas' => 'PERTANIAN',
                'program_studi' => null,
            ],
            [
                'id_user' => 'OO105',
                'username' => 'Operator FT',
                'password' => Hash::make('diprest105'),
                'nama' => 'Operator FT',
                'level' => 'operator',
                'fakultas' => 'TEKNIK',
                'program_studi' => null,
            ],
            [
                'id_user' => 'OO106',
                'username' => 'Operator FH',
                'password' => Hash::make('diprest106'),
                'nama' => 'Operator FH',
                'level' => 'operator',
                'fakultas' => 'HUKUM',
                'program_studi' => null,
            ],
            [
                'id_user' => 'OO107',
                'username' => 'Operator FISIP',
                'password' => Hash::make('diprest107'),
                'nama' => 'Operator FISIP',
                'level' => 'operator',
                'fakultas' => 'ILMU SOSIAL DAN ILMU POLITIK',
                'program_studi' => null,
            ],
            [
                'id_user' => 'OO108',
                'username' => 'Operator FK',
                'password' => Hash::make('diprest108'),
                'nama' => 'Operator FK',
                'level' => 'operator',
                'fakultas' => 'KEDOKTERAN',
                'program_studi' => null,
            ],
            [
                'id_user' => 'OO109',
                'username' => 'Operator FMIPA',
                'password' => Hash::make('diprest109'),
                'nama' => 'Operator FMIPA',
                'level' => 'operator',
                'fakultas' => 'MATEMATIKA DAN ILMU PENGETAHUAN ALAM',
                'program_studi' => null,
            ],
        ]);
    }
}

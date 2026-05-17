<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index(): string
    {
        $data = [
            'npm' => '2310010398',
            'nama' => 'Lukmanul Hakim',
            'prodi' => 'Teknik Informatika',
            'angkatan' => '2023',
            'ipk' => 3.80,
            'matkul' => [
                'Pemrograman Web 2',
                'Struktur Data',
                'Basis Data Lanjut',
                'Komputer Grafis',
                'Statistik Komputasi'
            ],
            'title' => 'Profil Saya'
        ];

        return view('profil/index', $data);
    }
}

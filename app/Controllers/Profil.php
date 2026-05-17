<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index(): string
    {
        $data = [
            'npm' => '225705001',
            'nama' => 'M. Luthfi Maulana',
            'prodi' => 'Teknik Informatika',
            'angkatan' => '2022',
            'ipk' => 3.85,
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
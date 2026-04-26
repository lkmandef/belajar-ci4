<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Akademik extends BaseController
{
    public function index(): string
    {
        return "<h1>Sistem Informasi Akademik</h1>
                <p>Nama: Lukman Hakim</p>";
    }

    public function matkul(): string
    {
        return "
        <h2>Mata Kuliah</h2>
        <ul>
            <li>Pemrograman Web 2</li>
            <li>Basis Data</li>
            <li>OOP</li>
            <li>Struktur Data</li>
            <li>Jaringan Komputer</li>
        </ul>
        ";
    }

    public function nilai($nim): string
    {
        return "<h2>Nilai Mahasiswa</h2>
                <p>NIM: $nim</p>";
    }
}

<?php

namespace App\Controllers;

class Galeri extends BaseController
{
    /**
     * Halaman galeri dengan filter kategori
     */
    public function index(): string
    {
        // Data galeri statis
        $galeri = [
            [
                'judul' => 'Danau Pegunungan',
                'url_gambar' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=300&h=200&fit=crop',
                'deskripsi' => 'Danau alami yang berada di kaki pegunungan dengan air jernih dan suasana yang sangat menenangkan.',
                'kategori' => 'alam'
            ],

            [
                'judul' => 'Jalan Kota Malam',
                'url_gambar' => 'https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?w=300&h=200&fit=crop',
                'deskripsi' => 'Suasana jalan perkotaan di malam hari yang dipenuhi lampu kendaraan dan gedung tinggi modern.',
                'kategori' => 'kota'
            ],

            [
                'judul' => 'Gajah Brazil',
                'url_gambar' => 'https://images.unsplash.com/photo-1549366021-9f761d450615?w=300&h=200&fit=crop',
                'deskripsi' => 'Seekor gajah brazil sedang berjalan di habitatnya dengan gerakan yang lembut dan anggun.',
                'kategori' => 'hewan'
            ],

            [
                'judul' => 'Air Terjun Tropis',
                'url_gambar' => 'https://images.unsplash.com/photo-1433086966358-54859d0ed716?w=300&h=200&fit=crop',
                'deskripsi' => 'Air terjun tinggi yang mengalir deras di tengah hutan tropis hijau yang masih sangat asri.',
                'kategori' => 'alam'
            ],

            [
                'judul' => 'Bangunan Bersejarah',
                'url_gambar' => 'https://images.unsplash.com/photo-1467269204594-9661b134dd2b?w=300&h=200&fit=crop',
                'deskripsi' => 'Gedung tua bergaya klasik Eropa yang tetap terawat dan menjadi ikon wisata sejarah kota.',
                'kategori' => 'kota'
            ],

            [
                'judul' => 'Burung Flamingo',
                'url_gambar' => 'https://images.unsplash.com/photo-1497206365907-f5e630693df0?w=300&h=200&fit=crop',
                'deskripsi' => 'Sekelompok burung flamingo berwarna merah muda sedang berdiri di tepi danau saat sore hari.',
                'kategori' => 'hewan'
            ],
        ];

        // Baca parameter kategori dari URL
        $kategori_filter = $this->request->getGet('kategori');

        // Filter galeri berdasarkan kategori jika ada
        if ($kategori_filter && $kategori_filter !== 'semua') {
            $galeri = array_filter($galeri, function ($item) use ($kategori_filter) {
                return $item['kategori'] === $kategori_filter;
            });
        }

        // Ambil daftar kategori unik
        $kategori_unik = array_unique(array_column($galeri, 'kategori'));

        $data = [
            'title' => 'Galeri',
            'galeri' => $galeri,
            'kategori_unik' => $kategori_unik,
            'kategori_aktif' => $kategori_filter ?: 'semua',
        ];

        return view('galeri/index', $data);
    }
}

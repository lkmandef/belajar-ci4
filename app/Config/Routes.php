<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Route default (halaman beranda)
$routes->get('/', 'Beranda::index');
// Route halaman tentang
$routes->get('tentang', 'Beranda::tentang');
// Route dengan parameter numerik
$routes->get('pengguna/(:num)', 'Beranda::pengguna/$1');
// Route halaman waktu
$routes->get('waktu', 'Home::waktu');
// Route Latihan
$routes->get('akademik', 'Akademik::index');
$routes->get('akademik/matkul', 'Akademik::matkul');
$routes->get('akademik/nilai/(:num)', 'Akademik::nilai/$1');

$routes->get('test/alpha/(:alpha)', 'Akademik::index/$1');
$routes->get('test/alphanum/(:alphanum)', 'Akademik::index/$1');

// Route controller Demo
$routes->get('demo', 'Demo::index');
// Route halaman profil
$routes->get('profil', 'Profil::index');

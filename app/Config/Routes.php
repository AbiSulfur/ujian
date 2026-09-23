<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Homepage & Detail Kuliner Jambi
$routes->get('/', 'Home::index');
$routes->get('makanan/(:segment)', 'Home::detail/$1');
$routes->get('tentang', 'Home::tentang');

// Katalog Menu & Live Sorting & Filter
$routes->get('menu', 'Menu::index');
$routes->get('menu/tambah', 'Menu::tambah');
$routes->post('menu/simpan', 'Menu::simpan');
$routes->get('menu/ubah/(:num)', 'Menu::ubah/$1');
$routes->post('menu/update/(:num)', 'Menu::update/$1');
$routes->post('menu/hapus/(:num)', 'Menu::hapus/$1');

// Form Pemesanan & Reservasi (Fitur Validasi Form CI4)
$routes->get('reservasi', 'Reservasi::index');
$routes->post('reservasi/simpan', 'Reservasi::store');
$routes->get('reservasi/sukses', 'Reservasi::sukses');
$routes->get('reservasi/riwayat', 'Reservasi::riwayat');

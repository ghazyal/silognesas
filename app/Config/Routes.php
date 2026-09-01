<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route utama
$routes->get('/', function () {

    if (logged_in()) {
        return redirect()->to('/dashboard');
    }

    return redirect()->to('/login');
});


// Semua user login
$routes->group('', ['filter'=>'login'], function($routes){

    $routes->get('dashboard', 'Dashboard::index');

});


// siswa + guru + superadmin
$routes->group('', ['filter'=>'role:siswa,guru,superadmin'], function($routes){

    // Barang
    $routes->get('barang', 'Barang::index');
    $routes->get('barang/tambah', 'Barang::tambah');
    $routes->get('barang/edit/(:num)', 'Barang::edit/$1');
    $routes->post('barang/simpan', 'Barang::simpan');
    $routes->post('barang/update/(:num)', 'Barang::update/$1');
    $routes->get('barang/delete/(:num)', 'Barang::delete/$1');
    $routes->get(
        'barang/aktifkan/(:num)',
        'Barang::aktifkan/$1'
    );

    // Supplier
    $routes->get('supplier', 'Supplier::index');
    $routes->get('supplier/tambah', 'Supplier::tambah');
    $routes->get('supplier/edit/(:num)', 'Supplier::edit/$1');
    $routes->post('supplier/simpan', 'Supplier::simpan');
    $routes->post('supplier/update/(:num)', 'Supplier::update/$1');
    $routes->get('supplier/delete/(:num)', 'Supplier::delete/$1');

    // transaksi
    $routes->get('transaksi', 'Transaksi::index');
    $routes->get('transaksi/tambah', 'Transaksi::tambah');
    $routes->post('transaksi/simpan', 'Transaksi::simpan');
    $routes->get(
        'transaksi/koreksi/(:num)',
        'Transaksi::koreksi/$1'
    );

    $routes->post(
        'transaksi/update/(:num)',
        'Transaksi::update/$1'
    );

    $routes->get(
    'transaksi/getSupplier/(:num)',
    'Transaksi::getSupplier/$1'
    );
});


// guru + superadmin
$routes->group('', ['filter'=>'role:guru,superadmin'], function($routes){

    $routes->get('laporan', 'Laporan::index');


    // Excel
    $routes->get(
        'laporan/excel/transaksi',
        'Laporan::exportExcelTransaksi'
    );

    $routes->get(
        'laporan/excel/stok',
        'Laporan::exportExcelStok'
    );


    // PDF
    $routes->get(
        'laporan/pdf/transaksi',
        'Laporan::exportPdfTransaksi'
    );

    $routes->get(
        'laporan/pdf/stok',
        'Laporan::exportPdfStok'
    );

});


// superadmin
$routes->group('', ['filter'=>'role:superadmin'], function($routes){

    // Gudang
    $routes->get('gudang', 'Gudang::index');
    $routes->get('gudang/tambah', 'Gudang::tambah');
    $routes->get('gudang/edit/(:num)', 'Gudang::edit/$1');
    $routes->post('gudang/simpan', 'Gudang::simpan');
    $routes->post('gudang/update/(:num)', 'Gudang::update/$1');
    $routes->get('gudang/delete/(:num)', 'Gudang::delete/$1');
    $routes->get(
        'gudang/aktifkan/(:num)',
        'Gudang::aktifkan/$1'
    );

    // Rak
    $routes->get('rak', 'Rak::index');
    $routes->get('rak/tambah', 'Rak::tambah');
    $routes->get('rak/edit/(:num)', 'Rak::edit/$1');
    $routes->post('rak/simpan', 'Rak::simpan');
    $routes->post('rak/update/(:num)', 'Rak::update/$1');
    $routes->get('rak/delete/(:num)', 'Rak::delete/$1');
    $routes->get('rak/aktifkan/(:num)', 'Rak::aktifkan/$1');

    // User
    $routes->get('users', 'User::index');
    $routes->get('users/tambah', 'User::tambah');
    $routes->post('users/simpan', 'User::simpan');
    $routes->get('users/delete/(:num)', 'User::delete/$1');
    $routes->get(
        'users/reset/(:num)',
        'User::reset/$1'
    );
    $routes->get('users/edit/(:num)', 'User::edit/$1');
    $routes->post('users/update/(:num)', 'User::update/$1');
});


// Myth Auth
if (class_exists('\Myth\Auth\Config\Auth')) {
    $routes->group('', ['namespace' => 'Myth\Auth\Controllers'], function($routes) {
        $routes->get('login', 'AuthController::login');
        $routes->post('login', 'AuthController::attemptLogin');
        $routes->get('register', 'AuthController::register');
        $routes->post('register', 'AuthController::attemptRegister');
        $routes->get('logout', 'AuthController::logout');
    });
}
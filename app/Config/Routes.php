<?php

namespace Config;

$routes = Services::routes();

if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// users not login
$routes->get('/', 'Main::index');
$routes->get('/tanaman', 'Main::tanaman');
$routes->get('/article/(:num)', 'Main::article/$1');
$routes->get('/cara/(:num)', 'Main::cara/$1');
$routes->get('/search', 'Main::search');

// user login
$routes->get('/mari-tanam', 'User\Users::mariTanam');
$routes->get('/saya-tanam', 'User\Users::sayaTanam');
$routes->get('/detail/(:num)/(:num)', 'User\Users::detail/$1/$2');

// login
$routes->get('/login', 'Login::index');
$routes->post('/login-proses', 'Login::prosesLogin');
$routes->get('/logout', 'Login::logout');

// regist
$routes->get('/regist', 'Regist::index');
$routes->post('/regist-proses', 'Regist::prosesRegist');

// admin
$routes->get('/admin', 'Admin\Admins::index');
$routes->get('/admin-tanaman', 'Admin\Admins::tanaman');
$routes->get('/admin-review', 'Admin\Admins::review');
$routes->get('/admin-admin', 'Admin\Admins::admin');
$routes->get('/admin-nomor', 'Admin\Admins::nomor');
$routes->get('/admin-set-dashboard', 'Admin\Admins::setDashboard');
$routes->get('/admin-pesanan', 'Admin\Admins::pesanan');
// tanaman
$routes->post('/tambah-tanaman', 'Admin\Tanamans::prosesTambahTanaman');
$routes->post('/delete-tanaman', 'Admin\Tanamans::prosesDeleteTanaman');
$routes->get('/tanaman-artikel/(:num)', 'Admin\Admins::tanamanArtikel/$1');
$routes->post('/tambah-artikel', 'Admin\Artikels::prosesTambahArtikel');
$routes->get('/tanaman-budidaya/(:num)', 'Admin\Admins::tanamanBudidaya/$1');
$routes->post('/tambah-budidaya', 'Admin\Budidayas::prosesTambahBudidaya');
$routes->get('/tanaman-pupuk/(:num)', 'Admin\Admins::tanamanPupuk/$1');
$routes->post('/tambah-pupuk', 'Admin\Pupuks::prosesTambahPupuk');
$routes->post('/delete-pupuk', 'Admin\Pupuks::prosesDeletePupuk');
$routes->get('/update-pupuk/(:num)/(:num)', 'Admin\Pupuks::prosesUpdatePupuk/$1/$2');
$routes->get('/tanaman-semprot/(:num)', 'Admin\Admins::tanamanSemprot/$1');
$routes->post('/tambah-semprot', 'Admin\Semprot::prosesTambahSemprot');
$routes->post('/delete-semprot', 'Admin\Semprot::prosesDeleteSemprot');
$routes->get('/update-semprot/(:num)/(:num)', 'Admin\Semprot::prosesUpdateSemprot/$1/$2');

// User
$routes->post('/save-tanam', 'User\Mari_tanam::prosesSaveTanam');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

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

// User
$routes->post('/save-tanam', 'User\Mari_tanam::prosesSaveTanam');
// $routes->post('/update-product', 'Admin\Product::prosesUpdateProduct');
// // $routes->delete('/delete-product/(:any)', 'Admin\Product::deleteProduct/$1');
// $routes->post('/delete-product', 'Admin\Product::deleteProduct');
// // review
// $routes->post('/tambah-review', 'Admin\Review::prosesTambahReview');
// $routes->post('/update-review', 'Admin\Review::prosesUpdateReview');
// $routes->post('/delete-review', 'Admin\Review::deleteReview');
// // nomor
// $routes->post('/update-nomor', 'Admin\Nomor::prosesUpdateNomor');
// // pesannan
// $routes->get('/admin-setuju/(:num)', 'Admin\Pesanan::pesananSetuju/$1');
// $routes->post('/admin-tolak', 'Admin\Pesanan::pesananTolak');
// // set dashboard
// $routes->post('/update-set-dashboard', 'Admin\SetDashboard::updateSet');

// // user
// // keranjang
// $routes->post('/user-tambah-keranjang', 'User\Keranjang::prosesTambahKeranjang');
// // chat
// $routes->get('/chat', 'User\Chat::index');
// // checkout
// $routes->post('/user-checkout', 'User\Checkout::prosesCheckout');
// // pesanan user
// $routes->get('/pesanan-user', 'User\PesananUser::index');
// // rating
// $routes->post('/proses-rating', 'User\Rating::prosesRating');



if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

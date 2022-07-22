<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Otentikasi
$routes->get('/', 'OtentikasiController::login', ['as' => 'otentikasi_login']);
$routes->post('login', 'OtentikasiController::login_post', ['as' => 'otentikasi_login_post']);
$routes->get('logout', 'OtentikasiController::logout', ['as' => 'otentikasi_logout']);


// User Admin
$routes->group('admin', function ($routes){
    $routes->get('dashboard', 'BerandaController::admin_dashboard', ['as' => 'dashboard_admin_index']);

    // Manajemen User Guru
    $routes->get('user/guru', 'GuruController::index', ['as' => 'user_guru_admin_index']);
    $routes->post('user/guru/save', 'GuruController::save', ['as' => 'user_guru_admin_save']);
    $routes->post('user/guru/update', 'GuruController::update', ['as' => 'user_guru_admin_update']);
    $routes->post('user/guru/delete', 'GuruController::delete', ['as' => 'user_guru_admin_delete']);
    // Manajemen User Siswa
    $routes->get('user/siswa', 'SiswaController::index', ['as' => 'user_siswa_admin_index']);
    $routes->post('user/siswa/save', 'SiswaController::save', ['as' => 'user_siswa_admin_save']);
    $routes->post('user/siswa/update', 'SiswaController::update', ['as' => 'user_siswa_admin_update']);
    $routes->post('user/siswa/delete', 'SiswaController::delete', ['as' => 'user_siswa_admin_delete']);

    // Manajemen Data Guru
    $routes->get('guru', 'GuruController::guru_index', ['as' => 'guru_admin_index']);
    $routes->post('guru/save', 'GuruController::guru_save', ['as' => 'guru_admin_save']);
    $routes->post('guru/update', 'GuruController::guru_update', ['as' => 'guru_admin_update']);
    $routes->post('guru/delete', 'GuruController::guru_delete', ['as' => 'guru_admin_delete']);

    // Manajemen Data Siswa
    $routes->get('siswa', 'SiswaController::siswa_index', ['as' => 'siswa_admin_index']);
    $routes->get('siswa/detail/(:any)', 'SiswaController::siswa_detail/$1', ['as' => 'siswa_admin_detail']);
    $routes->post('siswa/save', 'SiswaController::siswa_save', ['as' => 'siswa_admin_save']);
    $routes->post('siswa/update', 'SiswaController::siswa_update', ['as' => 'siswa_admin_update']);
    $routes->post('siswa/delete', 'SiswaController::siswa_delete', ['as' => 'siswa_admin_delete']);
    // Manajemen Data Kelas
    $routes->get('kelas', 'KelasController::index', ['as' => 'kelas_admin_index']);
    $routes->post('kelas/save', 'KelasController::save', ['as' => 'kelas_admin_save']);
    $routes->post('kelas/update', 'KelasController::update', ['as' => 'kelas_admin_update']);
    $routes->post('kelas/delete', 'KelasController::delete', ['as' => 'kelas_admin_delete']);
    
    // Manajemen Pelajaran Siswa
    $routes->get('pelajaran-siswa', 'PelajaranSiswaController::index', ['as' => 'pelajaran_siswa_admin_index']);
    $routes->post('pelajaran-siswa/save', 'PelajaranSiswaController::save', ['as' => 'pelajaran_siswa_admin_save']);
    $routes->post('pelajaran-siswa/update', 'PelajaranSiswaController::update', ['as' => 'pelajaran_siswa_admin_update']);
    $routes->post('pelajaran-siswa/delete', 'PelajaranSiswaController::delete', ['as' => 'pelajaran_siswa_admin_delete']);
    
    // Manajemen Jadwal Mata Pelajaran
    $routes->get('jadwal-mata-pelajaran', 'JadwalMataPelajaranController::index', ['as' => 'jadwal_mata_pelajaran_admin_index']);

    // Manajemen Jadwal Mengajar
    $routes->get('jadwal-mengajar', 'JadwalMengajarController::index', ['as' => 'jadwal_mengajar_admin_index']);

    // Manajemen Jadwal Ujian
    $routes->get('jadwal-ujian', 'JadwalUjianController::index', ['as' => 'jadwal_ujian_admin_index']);
    $routes->post('jadwal-ujian/save', 'JadwalUjianController::save', ['as' => 'jadwal_ujian_admin_save']);
    $routes->post('jadwal-ujian/update', 'JadwalUjianController::update', ['as' => 'jadwal_ujian_admin_update']);
    $routes->post('jadwal-ujian/delete', 'JadwalUjianController::delete', ['as' => 'jadwal_ujian_admin_delete']);
});

$routes->group('guru', function($routes){
    $routes->get('dashboard', 'BerandaController::guru_dashboard', ['as' => 'dashboard_guru_index']);

    // Manajemen Data Diri Guru
    $routes->get('data-guru', 'GuruController::data_guru', ['as' => 'data_guru_guru_index']);
    // Manajemen Jadwal Mata Pelajaran
    $routes->get('jadwal-mata-pelajaran', 'JadwalMataPelajaranController::index_guru', ['as' => 'jadwal_mata_pelajaran_guru_index']);

    // Manajemen Jadwal Mengajar
    $routes->get('jadwal-mengajar', 'JadwalMengajarController::index_guru', ['as' => 'jadwal_mengajar_guru_index']);

    // Manajemen Jadwal Ujian
    $routes->get('jadwal-ujian', 'JadwalUjianController::index_guru', ['as' => 'jadwal_ujian_guru_index']);

});

$routes->group('siswa', function($routes){
    $routes->get('dashboard', 'BerandaController::siswa_dashboard', ['as' => 'dashboard_siswa_index']);
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

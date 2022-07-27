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
    $routes->get('kelas/siswa/(:any)/(:any)', 'KelasController::kelas_siswa_index/$1/$2', ['as' => 'kelas_siswa_admin_index']);
    $routes->post('kelas/siswa/save', 'KelasController::kelas_siswa_save', ['as' => 'kelas_siswa_admin_save']);
    $routes->post('kelas/siswa/delete', 'KelasController::kelas_siswa_delete', ['as' => 'kelas_siswa_admin_delete']);
    
    // Manajemen Pelajaran Siswa
    $routes->get('pelajaran-siswa', 'PelajaranSiswaController::index', ['as' => 'pelajaran_siswa_admin_index']);
    $routes->post('pelajaran-siswa/save', 'PelajaranSiswaController::save', ['as' => 'pelajaran_siswa_admin_save']);
    $routes->post('pelajaran-siswa/update', 'PelajaranSiswaController::update', ['as' => 'pelajaran_siswa_admin_update']);
    $routes->post('pelajaran-siswa/delete', 'PelajaranSiswaController::delete', ['as' => 'pelajaran_siswa_admin_delete']);
    
    // Manajemen Jadwal Mata Pelajaran
    $routes->get('jadwal-mata-pelajaran', 'JadwalMataPelajaranController::index', ['as' => 'jadwal_mata_pelajaran_admin_index']);
    $routes->get('jadwal-mata-pelajaran/detail/(:any)/(:any)', 'JadwalMataPelajaranController::detail/$1/$2', ['as' => 'jadwal_mata_pelajaran_admin_detail']);


    // Manajemen Jadwal Mengajar
    $routes->get('jadwal-mengajar', 'JadwalMengajarController::index', ['as' => 'jadwal_mengajar_admin_index']);

    // Manajemen Jadwal Ujian
    $routes->get('jadwal-ujian', 'JadwalUjianController::index', ['as' => 'jadwal_ujian_admin_index']);
    $routes->post('jadwal-ujian/save', 'JadwalUjianController::save', ['as' => 'jadwal_ujian_admin_save']);
    $routes->post('jadwal-ujian/update', 'JadwalUjianController::update', ['as' => 'jadwal_ujian_admin_update']);
    $routes->post('jadwal-ujian/delete', 'JadwalUjianController::delete', ['as' => 'jadwal_ujian_admin_delete']);

    // Manajemen Set Semester
    $routes->get('semester', 'SemesterController::index', ['as' => 'semester_admin_index']);
    $routes->post('semester/save', 'SemesterController::save', ['as' => 'semester_admin_save']);
    $routes->post('semester/update', 'SemesterController::update', ['as' => 'semester_admin_update']);
    $routes->post('semester/delete', 'SemesterController::delete', ['as' => 'semester_admin_delete']);

    // Manajemen Absensi
    $routes->get('absensi', 'AbsensiController::index', ['as' => 'absensi_admin_index']);
    $routes->get('absensi/detail/(:any)/(:any)', 'AbsensiController::detail/$1/$2', ['as' => 'absensi_admin_detail']);
    $routes->post('absensi/save', 'AbsensiController::save', ['as' => 'absensi_admin_save']);
    $routes->post('absensi/update', 'AbsensiController::update', ['as' => 'absensi_admin_update']);
    $routes->post('absensi/delete', 'AbsensiController::delete', ['as' => 'absensi_admin_delete']);

});

$routes->group('guru', function($routes){
    $routes->get('dashboard', 'BerandaController::guru_dashboard', ['as' => 'dashboard_guru_index']);

    // Manajemen Data Diri Guru
    $routes->get('data-guru', 'GuruController::data_guru', ['as' => 'data_guru_guru_index']);
    // Manajemen Jadwal Mata Pelajaran
    $routes->get('jadwal-mata-pelajaran', 'JadwalMataPelajaranController::index_guru', ['as' => 'jadwal_mata_pelajaran_guru_index']);
    $routes->get('jadwal-mata-pelajaran/detail/(:any)/(:any)', 'JadwalMataPelajaranController::detail_siswa/$1/$2', ['as' => 'jadwal_mata_pelajaran_guru_detail']);

    // Manajemen Jadwal Mengajar
    $routes->get('jadwal-mengajar', 'JadwalMengajarController::index_guru', ['as' => 'jadwal_mengajar_guru_index']);

    // Manajemen Jadwal Ujian
    $routes->get('jadwal-ujian', 'JadwalUjianController::index_guru', ['as' => 'jadwal_ujian_guru_index']);

    // Manajemen Absensi
    $routes->get('absensi', 'AbsensiController::guru_index', ['as' => 'absensi_guru_index']);
    $routes->get('absensi/detail/(:any)/(:any)', 'AbsensiController::guru_detail/$1/$2', ['as' => 'absensi_guru_detail']);
    $routes->post('absensi/add', 'AbsensiController::guru_add', ['as' => 'absensi_guru_add']);
    $routes->post('absensi/save', 'AbsensiController::guru_save', ['as' => 'absensi_guru_save']);
    $routes->post('absensi/update', 'AbsensiController::guru_update', ['as' => 'absensi_guru_update']);
    $routes->post('absensi/delete', 'AbsensiController::guru_delete', ['as' => 'absensi_guru_delete']);

    // Manajemen Nilai Pengetahuan
    $routes->get('nilai-pengetahuan', 'NilaiPengetahuanController::index', ['as' => 'nilai_pengetahuan_guru_index']);
    $routes->get('nilai-pengetahuan/detail/(:any)/(:any)/(:any)', 'NilaiPengetahuanController::detail/$1/$2/$3', ['as' => 'nilai_pengetahuan_guru_detail']);
    $routes->post('nilai-pengetahuan/add', 'NilaiPengetahuanController::add', ['as' => 'nilai_pengetahuan_guru_add']);
    $routes->post('nilai-pengetahuan/save', 'NilaiPengetahuanController::save', ['as' => 'nilai_pengetahuan_guru_save']);
    $routes->post('nilai-pengetahuan/update', 'NilaiPengetahuanController::update', ['as' => 'nilai_pengetahuan_guru_update']);
    $routes->post('nilai-pengetahuan/delete', 'NilaiPengetahuanController::delete', ['as' => 'nilai_pengetahuan_guru_delete']);

    // Manajemen Nilai Keterampilan
    $routes->get('nilai-keterampilan', 'NilaiKeterampilanController::index', ['as' => 'nilai_keterampilan_guru_index']);
    $routes->get('nilai-keterampilan/detail/(:any)/(:any)/(:any)', 'NilaiKeterampilanController::detail/$1/$2/$3', ['as' => 'nilai_keterampilan_guru_detail']);
    $routes->post('nilai-keterampilan/add', 'NilaiKeterampilanController::add', ['as' => 'nilai_keterampilan_guru_add']);
    $routes->post('nilai-keterampilan/save', 'NilaiKeterampilanController::save', ['as' => 'nilai_keterampilan_guru_save']);
    $routes->post('nilai-keterampilan/update', 'NilaiKeterampilanController::update', ['as' => 'nilai_keterampilan_guru_update']);
    $routes->post('nilai-keterampilan/delete', 'NilaiKeterampilanController::delete', ['as' => 'nilai_keterampilan_guru_delete']);

    // Manajemen Raport
    $routes->get('raport', 'RaportController::index', ['as' => 'raport_guru_index']);
    $routes->get('raport/daftar-siswa/(:any)/(:any)', 'RaportController::daftar_siswa/$1/$2', ['as' => 'raport_guru_daftar_siswa']);
    $routes->get('raport/kompetensi-keahlian/(:any)', 'RaportController::kompetensi_keahlian/$1', ['as' => 'raport_guru_kompetensi_keahlian']);
    $routes->post('raport/kompetensi-keahlian/', 'RaportController::kompetensi_keahlian_save', ['as' => 'raport_guru_kompetensi_keahlian_save']);
    $routes->get('raport/ektrakurikuler/(:any)', 'RaportController::ekstrakurikuler/$1', ['as' => 'raport_guru_ekstrakurikuler']);
    $routes->post('raport/ektrakurikuler/', 'RaportController::ekstrakurikuler_save', ['as' => 'raport_guru_ekstrakurikuler_save']);
    $routes->get('raport/saran/(:any)', 'RaportController::saran/$1', ['as' => 'raport_guru_saran']);
    $routes->post('raport/saran/', 'RaportController::saran_save', ['as' => 'raport_guru_saran_save']);
    $routes->get('raport/pengetahuan-keterampilan/(:any)', 'RaportController::pengetahuan_keterampilan/$1', ['as' => 'raport_guru_pengetahuan_keterampilan']);
    $routes->post('raport/pengetahuan-keterampilan/', 'RaportController::pengetahuan_keterampilan_save', ['as' => 'raport_guru_pengetahuan_keterampilan_save']);

    // Manajemen Raport Khusus Prestasi
    $routes->get('raport/prestasi/(:any)', 'RaportController::prestasi/$1', ['as' => 'raport_guru_prestasi']);
    $routes->post('raport/prestasi/save', 'RaportController::prestasi_save', ['as' => 'raport_guru_prestasi_save']);
    $routes->post('raport/prestasi/add', 'RaportController::prestasi_add', ['as' => 'raport_guru_prestasi_add']);
    // Manajemen Raport Khusus Ketidakhadiran
    $routes->get('raport/ketidakhadiran/(:any)', 'RaportController::ketidakhadiran/$1', ['as' => 'raport_guru_ketidakhadiran']);
    $routes->post('raport/ketidakhadiran/', 'RaportController::ketidakhadiran_save', ['as' => 'raport_guru_ketidakhadiran_save']);
    // Manajemen Raport Khusus Diagram Pengetahuan dan Keterampilan
    $routes->get('raport/diagram-pengetahuan-keterampilan/(:any)', 'RaportController::diagram_pengetahuan_keterampilan/$1', ['as' => 'raport_guru_diagram_pengetahuan_keterampilan']);

    // Room Chat
    $routes->get('room-chat', 'RoomChatController::index', ['as' => 'room_chat_index']);
    $routes->post('room-chat-group', 'RoomChatController::room_chat_group', ['as' => 'room_chat_group']);
    $routes->post('room-chat-siswa', 'RoomChatController::room_chat_siswa', ['as' => 'room_chat_siswa']);

});

$routes->group('siswa', function($routes){
    $routes->get('dashboard', 'BerandaController::siswa_dashboard', ['as' => 'dashboard_siswa_index']);

    $routes->get('data-siswa', 'SiswaController::data_siswa' , ['as' => 'data_siswa_siswa_index']);

    // Manajemen Jadwal Mata Pelajaran
    $routes->get('jadwal-mata-pelajaran', 'JadwalMataPelajaranController::index_siswa', ['as' => 'jadwal_mata_pelajaran_siswa_index']);
    $routes->get('jadwal-mata-pelajaran/(:any)/(:any)', 'JadwalMataPelajaranController::detail_siswa/$1/$2', ['as' => 'jadwal_mata_pelajaran_siswa_detail']);

    // Manajemen Jadwal Ujian
    $routes->get('jadwal-ujian', 'JadwalUjianController::index_siswa', ['as' => 'jadwal_ujian_siswa_index']);

    // Manejemen Nilai Pengetahuan
    $routes->get('nilai-pengetahuan', 'NilaiPengetahuanController::index_siswa', ['as' => 'nilai_pengetahuan_siswa_index']);
    $routes->get('nilai-pengetahuan/detail/(:any)/(:any)/(:any)', 'NilaiPengetahuanController::detail_siswa/$1/$2/$3', ['as' => 'nilai_pengetahuan_siswa_detail']);

    // Manajemen Nilai Nilai Keterampilan
    $routes->get('nilai-keterampilan', 'NilaiKeterampilanController::index_siswa', ['as' => 'nilai_keterampilan_siswa_index']);
    $routes->get('nilai-keterampilan/detail/(:any)/(:any)/(:any)', 'NilaiKeterampilanController::detail_siswa/$1/$2/$3', ['as' => 'nilai_keterampilan_siswa_detail']);
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

<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('template.front.index');
});

Auth::routes();
Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@getLogin')->middleware('guest');
    Route::post('/login', 'LoginController@postLogin')->name('login');
    Route::get('/login/cek-email/', 'LoginController@cek_email')->name('login.cek_email');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

//Struktur Organisasi
Route::get('/cuk/getStruktur/grafik', 'DashboardRTController@getStruktur')->name('getStruktur');
Route::get('/home-maps', 'DashboardRTController@maps')->name('home.maps');
Route::get('/about-faq', function () {
    return view('template.front.index-faq');
})->name('index.faq');

Route::name('admin.')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard-rt', 'DashboardRTController@index')->name('dashboard.rt');
    Route::get('/user-management','UserManagementController@index')->name('user');
    Route::post('/user-management/tambah','UserManagementController@tambah')->name('master.user.tambah');
    Route::post('/user-management/update','UserManagementController@update')->name('master.user.update');
    Route::get('/user-management/hapus/{id}','UserManagementController@hapus');

    Route::get('/ronda', 'JadwalRonda@index')->name('ronda');
    Route::get('/ronda/getdata/', 'JadwalRonda@getData')->name('getData');
    Route::post('/ronda/store/', 'JadwalRonda@store')->name('ronda.store');
    Route::post('/ronda/edit/', 'JadwalRonda@edit')->name('ronda.edit');
    Route::get('/ronda/hapus/{id}', 'JadwalRonda@hapus')->name('ronda.hapus');

    // send Email
    Route::get('/ronda/mail/send/{tgl}', 'JadwalRonda@sendEmail');
    
    //Laporan Keuangan
    Route::get('/admin/laporan-keuangan','LaporanKeuangan@index_admin')->name('laporan.keuangan');
    Route::get('/admin/laporan-keuangan/getdata/', 'LaporanKeuangan@get_data_admin');
    Route::post('/admin/laporan-keuangan/store','LaporanKeuangan@store_admin')->name('laporan.keuangan.store');
    Route::post('/admin/laporan-keuangan/update','LaporanKeuangan@update_admin')->name('laporan.keuangan.update');

    Route::namespace('Master')->group(function () {
        //Master Berita
        Route::get('/master-berita','MasterBerita@index')->name('berita');
        Route::post('/master-berita/store','MasterBerita@store')->name('berita.store');
        Route::post('/master-berita/update','MasterBerita@update')->name('berita.update');
        Route::get('/master-berita/hapus/{id}','MasterBerita@hapus')->name('berita.hapus');

        // Master Document
        Route::get('/master-surat','MasterDocument@index')->name('document');
        Route::get('/master-surat/domisili','MasterDocument@index_domisili')->name('surat.domisili');
        Route::post('/master-surat/domisili/edit','MasterDocument@edit_domisili')->name('surat.edit_domisili');
        Route::get('/master-surat/domisili/hapus/{id}','MasterDocument@hapus_domisili')->name('surat.hapus_domisili');
        
        Route::get('/master-surat/menikah','MasterDocument@index_menikah')->name('surat.menikah');
        Route::get('/surat-menikah/admin-get-detail/','MasterDocument@getDetail')->name('surat.menikah.getDetail');
        Route::post('/master-surat/menikah/edit','MasterDocument@edit_menikah')->name('surat.edit_menikah');
        Route::get('/master-surat/menikah/hapus/{id}','MasterDocument@hapus_menikah')->name('surat.hapus_menikah');

        // Master Random
            //Master Biografi
            Route::get('/biografi','MasterRandom@index_biografi')->name('biografi');
            Route::post('/biografi/update','MasterRandom@update_biografi')->name('biografi.update');
            //Master Video
            Route::get('/video','MasterRandom@index_video')->name('video');
            Route::post('/video/update','MasterRandom@update_video')->name('video.update');
            //Master Struktur Organisasi
            Route::get('/master-organisasi', 'MasterRandom@index_organisasi')->name('organisasi');
            Route::post('/master-organisasi/update', 'MasterRandom@update_organisasi')->name('organisasi.update');
        // Master Random

        //Master Testi
        Route::get('/master-testi-admin', 'MasterTesti@index_admin')->name('testi');
        Route::post('/master-testi-admin/update', 'MasterTesti@update_admin')->name('testi.update');
        Route::get('/master-testi-admin/hapus/{id}','MasterTesti@hapus_admin')->name('testi.hapus');

        //Master FAQ
        Route::get('/master-faq', 'MasterFAQ@index')->name('faq');
        Route::post('/master-faq/tambah', 'MasterFAQ@tambah')->name('faq.tambah');
        Route::post('/master-faq/edit', 'MasterFAQ@edit')->name('faq.edit');
        Route::get('/master-faq/hapus/{id}', 'MasterFAQ@hapus')->name('faq.hapus');
        
    });
});

Route::name('user.')->middleware('auth:user')->group(function () {
    Route::get('/dashboard-warga', 'DashboardWargaController@index')->name('dashboard.warga');
    Route::get('/dashboard-warga/grafik-kelamin', 'DashboardWargaController@grafikKelamin')->name('grafikKelamin');
    //Jadwal Ronda
    Route::get('/user/ronda', 'JadwalRonda@index_user')->name('ronda');
    Route::get('/user/ronda/getdata/', 'JadwalRonda@getData_user');

    Route::get('/user/surat', 'suratController@index')->name('surat');

    //Surat Domisili
    Route::get('/surat-domisili','suratController@index_domisili')->name('surat.domisili.index');
    Route::post('/surat-domisili/store','suratController@store_domisili')->name('surat.domisili.store');
    Route::post('/surat-domisili/edit','suratController@edit_domisili')->name('surat.domisili.edit');
    Route::get('/surat-domisili/kirim/{id}','suratController@kirim_domisili')->name('surat.domisili.kirim');
    Route::get('/surat-domisili/domisili/{id}','suratController@cetak_surat_domisili')->name('surat.cetak_surat_domisili');

    //Surat Pernyataan Menikah
    Route::get('/surat-menikah','suratController@index_menikah')->name('surat.menikah.index');
    Route::post('/surat-menikah/store','suratController@store_menikah')->name('surat.menikah.store');
    Route::get('/surat-menikah/get-detail/','suratController@getDetail')->name('surat.menikah.getDetail');
    Route::post('/surat-menikah/update','suratController@update_menikah')->name('surat.menikah.update');
    Route::get('/surat-menikah/kirim/{id}','suratController@kirim_menikah')->name('surat.menikah.kirim');
    Route::get('/surat-menikah/menikah/{id}','suratController@cetak_surat_menikah')->name('surat.cetak_surat_menikah');

    //Laporan Keuangan
    Route::get('/laporan-keuangan','LaporanKeuangan@index_user')->name('laporan.keuangan');
    Route::get('/laporan-keuangan/getdata/', 'LaporanKeuangan@get_data_user');
    
    Route::namespace('Master')->group(function () {

        //Master Testi
        Route::get('/master-testi', 'MasterTesti@index')->name('testi');
        Route::post('/master-testi/store', 'MasterTesti@store')->name('testi.store');
        Route::post('/master-testi/update', 'MasterTesti@update')->name('testi.update');
        Route::get('/master-testi/hapus/{id}','MasterTesti@hapus')->name('testi.hapus');

    });
});

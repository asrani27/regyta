<?php

Route::post('/login', 'LoginController@login');
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('superadmin')) {
            return redirect('/superadmin');
        }
    }
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::group(['middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/superadmin', 'SuperadminController@beranda');
    Route::get('/superadmin/bidang', 'SuperadminController@bidang');
    Route::get('/superadmin/bidang/create', 'SuperadminController@bidangcreate');
    Route::post('/superadmin/bidang/create', 'SuperadminController@bidangstore');
    Route::get('/superadmin/bidang/edit/{id}', 'SuperadminController@bidangedit');
    Route::post('/superadmin/bidang/edit/{id}', 'SuperadminController@bidangupdate');
    Route::get('/superadmin/bidang/delete/{id}', 'SuperadminController@bidangdelete');

    Route::get('/superadmin/jabatan', 'SuperadminController@jabatan');
    Route::get('/superadmin/jabatan/create', 'SuperadminController@jabatancreate');
    Route::post('/superadmin/jabatan/create', 'SuperadminController@jabatanstore');
    Route::get('/superadmin/jabatan/edit/{id}', 'SuperadminController@jabatanedit');
    Route::post('/superadmin/jabatan/edit/{id}', 'SuperadminController@jabatanupdate');
    Route::get('/superadmin/jabatan/delete/{id}', 'SuperadminController@jabatandelete');

    Route::get('/superadmin/pangkat', 'SuperadminController@pangkat');
    Route::get('/superadmin/pangkat/create', 'SuperadminController@pangkatcreate');
    Route::post('/superadmin/pangkat/create', 'SuperadminController@pangkatstore');
    Route::get('/superadmin/pangkat/edit/{id}', 'SuperadminController@pangkatedit');
    Route::post('/superadmin/pangkat/edit/{id}', 'SuperadminController@pangkatupdate');
    Route::get('/superadmin/pangkat/delete/{id}', 'SuperadminController@pangkatdelete');

    Route::get('/superadmin/petugas', 'SuperadminController@petugas');
    Route::get('/superadmin/petugas/create', 'SuperadminController@petugascreate');
    Route::post('/superadmin/petugas/create', 'SuperadminController@petugasstore');
    Route::get('/superadmin/petugas/edit/{id}', 'SuperadminController@petugasedit');
    Route::post('/superadmin/petugas/edit/{id}', 'SuperadminController@petugasupdate');
    Route::get('/superadmin/petugas/delete/{id}', 'SuperadminController@petugasdelete');

    Route::get('/superadmin/pegawai', 'SuperadminController@pegawai');
    Route::get('/superadmin/pegawai/create', 'SuperadminController@pegawaicreate');
    Route::post('/superadmin/pegawai/create', 'SuperadminController@pegawaistore');
    Route::get('/superadmin/pegawai/edit/{id}', 'SuperadminController@pegawaiedit');
    Route::post('/superadmin/pegawai/edit/{id}', 'SuperadminController@pegawaiupdate');
    Route::get('/superadmin/pegawai/delete/{id}', 'SuperadminController@pegawaidelete');

    Route::get('/superadmin/gaji', 'SuperadminController@gaji');
    Route::get('/superadmin/gaji/create', 'SuperadminController@gajicreate');
    Route::post('/superadmin/gaji/create', 'SuperadminController@gajistore');
    Route::get('/superadmin/gaji/edit/{id}', 'SuperadminController@gajiedit');
    Route::post('/superadmin/gaji/edit/{id}', 'SuperadminController@gajiupdate');
    Route::get('/superadmin/gaji/delete/{id}', 'SuperadminController@gajidelete');

    Route::get('/superadmin/laporan', 'SuperadminController@laporan');
    Route::get('/superadmin/laporan/datapns', 'SuperadminController@datapns');
    Route::get('/superadmin/laporan/datanonpns', 'SuperadminController@datanonpns');
    Route::post('/superadmin/laporan/pergolongan', 'SuperadminController@pergolongan');
    Route::post('/superadmin/laporan/perbidang', 'SuperadminController@perbidang');
    Route::post('/superadmin/laporan/gajipns', 'SuperadminController@gajipns');
    Route::post('/superadmin/laporan/gajinonpns', 'SuperadminController@gajinonpns');
    Route::post('/superadmin/laporan', 'SuperadminController@exportpdf');
});

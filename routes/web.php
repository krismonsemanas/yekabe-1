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
    return view('segera');
});




Route::group(['prefix' => 'manage', 'middleware'=>['auth','checkRole:ADMIN']], function () {
    Route::get('/dashboard','DashboardController@index');

    Route::get('/karyawan','KaryawanController@index');
    Route::get('/karyawan/new','KaryawanController@create');
    Route::post('/karyawan', 'KaryawanController@store');
    Route::get('/karyawan/{kategori}/edit', 'KaryawanController@edit');
    Route::patch('/karyawan/{kategori}', 'KaryawanController@update');
    Route::post('/karyawan/delete/{id}', 'KaryawanController@destroy');

    Route::get('/guru','GuruController@index');
    Route::get('/guru/new','GuruController@create');
    Route::post('/guru', 'GuruController@store');
    Route::get('/guru/{kategori}/edit', 'GuruController@edit');
    Route::patch('/guru/{kategori}', 'GuruController@update');
    Route::post('/guru/delete/{id}', 'GuruController@destroy');

    Route::get('/wali','WaliController@index');
    Route::get('/wali/new','WaliController@create');
    Route::post('/wali', 'WaliController@store');
    Route::get('/wali/{kategori}/edit', 'WaliController@edit');
    Route::patch('/wali/{kategori}', 'WaliController@update');
    Route::post('/wali/delete/{id}', 'WaliController@destroy');

    Route::get('/pengumuman','PengumumanController@index');
    Route::get('/pengumuman/new','PengumumanController@create');
    Route::post('/pengumuman', 'PengumumanController@store');
    Route::get('/pengumuman/{kategori}/edit', 'PengumumanController@edit');
    Route::patch('/pengumuman/{kategori}', 'PengumumanController@update');
    Route::post('/pengumuman/delete/{id}', 'PengumumanController@destroy');


    Route::get('/periode','PeriodeController@index');
    Route::get('/periode/new','PeriodeController@create');
    Route::post('/periode', 'PeriodeController@store');
    Route::get('/periode/{kategori}/edit', 'PeriodeController@edit');
    Route::patch('/periode/{kategori}', 'PeriodeController@update');
    Route::post('/periode/delete/{id}', 'PeriodeController@destroy');

    Route::get('/kelas','KelasController@index');
    Route::get('/kelas/new','KelasController@create');
    Route::post('/kelas', 'KelasController@store');
    Route::get('/kelas/{kategori}/edit', 'KelasController@edit');
    Route::patch('/kelas/{kategori}', 'KelasController@update');
    Route::post('/kelas/delete/{id}', 'KelasController@destroy');

    Route::get('/mapel','MapelController@index');
    Route::get('/mapel/new','MapelController@create');
    Route::post('/mapel', 'MapelController@store');
    Route::get('/mapel/{kategori}/edit', 'MapelController@edit');
    Route::patch('/mapel/{kategori}', 'MapelController@update');
    Route::post('/mapel/delete/{id}', 'MapelController@destroy');


    //siswa
    Route::get('/profil_siswa','ProfilSiswaController@index');
    Route::get('/profil_siswa/new','ProfilSiswaController@create');
    Route::post('/profil_siswa', 'ProfilSiswaController@store');
    Route::get('/profil_siswa/{kategori}/edit', 'ProfilSiswaController@edit');
    Route::patch('/profil_siswa/{kategori}', 'ProfilSiswaController@update');
    Route::post('/profil_siswa/delete/{id}', 'ProfilSiswaController@destroy');

    Route::get('/murid','MuridController@index');
    Route::get('/murid/new','MuridController@create');
    Route::post('/murid', 'MuridController@store');
    Route::get('/murid/{kategori}/edit', 'MuridController@edit');
    Route::patch('/murid/{kategori}', 'MuridController@update');
    Route::post('/murid/delete/{id}', 'MuridController@destroy');

});
Route::get('/json-regencies','KaryawanController@regencies');
Route::get('/json-districts', 'KaryawanController@districts');
Route::get('/json-village', 'KaryawanController@villages');
Route::get('/json-pos', 'KaryawanController@pos');

Route::group(['prefix'=>'guru','middleware'=>['auth','can:guru']],function(){
    Route::get('/','DashboardGuruController@index');

    Route::get('/profil-saya','ProfileKaryawanController@edit')->name('guru.profil.edit');
    Route::patch('/profil-saya','ProfileKaryawanController@update')->name('guru.profil.update');

    Route::get('/ubah-password','ProfileKaryawanController@editPassword')->name('guru.password.edit');
    Route::patch('/ubah-password','ProfileKaryawanController@updatePassword')->name('guru.password.update');

});



Auth::routes();


Route::get('/json-regencies','KaryawanController@regencies');
Route::get('/json-districts', 'KaryawanController@districts');
Route::get('/json-village', 'KaryawanController@villages');
Route::get('/json-pos', 'KaryawanController@pos');



// Route::get('/home', 'HomeController@index')->name('home');



// Route::prefix('login_app')
//     ->as('login_app.')
//     ->group(function() {
//         Route::get('manage/dashboard', 'DashboardController@index');
// Route::namespace('Auth\Login')
//       ->group(function() {
//     Route::get('login', 'LoginAppController@showLoginForm')->name('login');
//     Route::post('login', 'LoginAppController@login')->name('login');
//     Route::post('logout', 'LoginAppController@logout')->name('logout');
//       });
//  });

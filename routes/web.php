<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'Auth\LoginController@showLoginForm');

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::prefix('application')->middleware('auth')->namespace('Application\Web')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    // data karayawan
    Route::get('data-siswa', 'SiswaController@index')->name('siswa.index');
    Route::get('data-siswa/tambah', 'SiswaController@create')->name('siswa.create');
    Route::post('data-siswa/simpan', 'SiswaController@store')->name('siswa.store');
    Route::get('data-siswa/ubah/{id}', 'SiswaController@edit')->name('siswa.edit');
    Route::put('data-siswa/perbaharui/{id}', 'SiswaController@update')->name('siswa.update');
    Route::delete('data-siswa/hapus/{id}', 'SiswaController@destroy')->name('siswa.destroy');

    // data kriteria
    Route::get('data-kriteria', 'KriteriaController@index')->name('kriteria.index');
    Route::post('data-kriteria/simpan', 'KriteriaController@store')->name('kriteria.store');
    Route::get('data-kriteria/ubah/{id}/', 'KriteriaController@edit')->name('kriteria.edit');
    Route::put('data-kriteria/perbaharui/{id}', 'KriteriaController@update')->name('kriteria.update');
    Route::delete('data-kriteria/hapus/{id}', 'KriteriaController@destroy')->name('kriteria.destroy');

    // penilaian Siswa
    Route::get('penilaian-siswa', 'TopsisController@penilaianAwal')->name('penilaianAwal');
    Route::post('penilaian-siswa/simpan', 'TopsisController@storePenilaianAwal')->name('storePenilaianAwal');
    Route::get('penilaian-siswa/ubah/{id}', 'TopsisController@editPenilaianAwal')->name('editPenilaianAwal');
    Route::put('penilaian-siswa/perbaharui/{id}', 'TopsisController@updatePenilaianAwal')->name('updatePenilaianAwal');
    Route::delete('penilaian-siswa/hapus/{id}', 'TopsisController@destroyPenilaianAwal')->name('destroyPenilaianAwal');

    // Hasil Topsis
    Route::get('hasil-topsis-normalisasi', 'TopsisController@hasilNoramlasiasi')->name('normalisasi');
    Route::get('hasil-topsis-bobot', 'TopsisController@hasilPembobotan')->name('bobot');
    Route::get('hasil-topsis-ideal', 'TopsisController@hasilIdeal')->name('ideal');
    Route::get('hasil-topsis-jarak', 'TopsisController@hasilJarak')->name('jarak');
    Route::get('hasil-topsis-preferensi', 'TopsisController@hasilPreferensi')->name('preferensi');

    // store topsis
    Route::prefix('hasil-perhitungan')->name('simpan.')->group(function () {
        Route::post('/normalisasi/simpan', 'TopsisController@storeNormalisasi')->name('Normalisasi');
        Route::post('/pembobotan/simpan', 'TopsisController@storeBobot')->name('Pembobotan');
        Route::post('/jarak-ideal/simpan', 'TopsisController@storeJarak')->name('JarakIdeal');
        Route::post('/preferensi/simpan', 'TopsisController@storePreferensi')->name('Preferensi');
    });
});

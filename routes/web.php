<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


//Authentication
Auth::routes();
Route::get('/home', 'Admin\HomeController@index');
Route::get('/admin/home', 'Admin\HomeController@index');
Route::get('/admin/change', 'Admin\HomeController@change');
Route::post('/admin/change_password', 'Admin\HomeController@change_password');

//Siswa
Route::get('/admin/siswa', 'Admin\SiswaController@read');
Route::get('/admin/siswa/add', 'Admin\SiswaController@add');
Route::post('/admin/siswa/create', 'Admin\SiswaController@create');
Route::get('/admin/siswa/edit/{id}', 'Admin\SiswaController@edit');
Route::post('/admin/siswa/update/{id}', 'Admin\SiswaController@update');
Route::get('/admin/siswa/delete/{id}', 'Admin\SiswaController@delete');

//Kelas
Route::get('/admin/kelas', 'Admin\KelasController@read');
Route::get('/admin/kelas/add', 'Admin\KelasController@add');
Route::post('/admin/kelas/create', 'Admin\KelasController@create');
Route::get('/admin/kelas/edit/{id}', 'Admin\KelasController@edit');
Route::post('/admin/kelas/update/{id}', 'Admin\KelasController@update');
Route::get('/admin/kelas/delete/{id}', 'Admin\KelasController@delete');

//Buku
Route::get('/admin/jurusan', 'Admin\JurusanController@read');
Route::get('/admin/jurusan/add', 'Admin\JurusanController@add');
Route::post('/admin/jurusan/create', 'Admin\JurusanController@create');
Route::get('/admin/jurusan/edit/{id}', 'Admin\JurusanController@edit');
Route::post('/admin/jurusan/update/{id}', 'Admin\JurusanController@update');
Route::get('/admin/jurusan/delete/{id}', 'Admin\JurusanController@delete');

//Buku
Route::get('/admin/buku', 'Admin\BukuController@read');
Route::get('/admin/buku/add', 'Admin\BukuController@add');
Route::post('/admin/buku/create', 'Admin\BukuController@create');
Route::get('/admin/buku/edit/{id}', 'Admin\BukuController@edit');
Route::post('/admin/buku/update/{id}', 'Admin\BukuController@update');
Route::get('/admin/buku/delete/{id}', 'Admin\BukuController@delete');

//Semester
Route::get('/admin/semester', 'Admin\SemesterController@read');
Route::get('/admin/semester/add', 'Admin\SemesterController@add');
Route::post('/admin/semester/create', 'Admin\SemesterController@create');
Route::get('/admin/semester/edit/{id}', 'Admin\SemesterController@edit');
Route::post('/admin/semester/update/{id}', 'Admin\SemesterController@update');
Route::get('/admin/semester/delete/{id}', 'Admin\SemesterController@delete');

//Peminjaman
Route::get('/admin/peminjaman', 'Admin\PeminjamanController@read');
Route::get('/admin/peminjaman/add', 'Admin\PeminjamanController@add');
Route::post('/admin/peminjaman/create', 'Admin\PeminjamanController@create');
Route::get('/admin/peminjaman/edit/{id}', 'Admin\PeminjamanController@edit');
Route::post('/admin/peminjaman/update/{id}', 'Admin\PeminjamanController@update');
Route::get('/admin/peminjaman/delete/{id}', 'Admin\PeminjamanController@delete');

//Pengembalian
Route::get('/admin/pengembalian', 'Admin\PengembalianController@read');
Route::get('/admin/pengembalian/add', 'Admin\PengembalianController@add');
Route::post('/admin/pengembalian/create', 'Admin\PengembalianController@create');
Route::get('/admin/pengembalian/edit/{id}', 'Admin\PengembalianController@edit');
Route::post('/admin/pengembalian/update/{id}', 'Admin\PengembalianController@update');
Route::get('/admin/pengembalian/delete/{id}', 'Admin\PengembalianController@delete');
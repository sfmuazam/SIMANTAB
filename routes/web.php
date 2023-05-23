<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\Kelas10Controller;
use App\Http\Controllers\Kelas11Controller;
use App\Http\Controllers\Kelas12Controller;
use App\Http\Controllers\TotalPerSiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetunjukController;

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

Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::get('/index', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/index', [LoginController::class, 'authenticate'])->name('login.index');

Route::group([
    'middleware' => 'auth',
], function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::post('/profil/ganti_password', [ProfilController::class, 'ganti_password'])->name('profil.ganti_password');

    Route::group([
        'middleware' => 'admin',
    ], function () {
        //User
        Route::resource('user', UserController::class);
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::delete('/user', [UserController::class, 'deleteAll'])->name('user.deleteAll');
        Route::post('/user/reset', [UserController::class, 'reset'])->name('user.reset');
    });
    //Kelas
    Route::resource('kelas', KelasController::class);
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::delete('/kelas', [KelasController::class, 'deleteAll'])->name('kelas.deleteAll');
    Route::post('/kelas/import', [KelasController::class, 'import'])->name('kelas.import');

    //Siswa
    Route::resource('siswa', SiswaController::class);
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::delete('/siswa', [SiswaController::class, 'deleteAll'])->name('siswa.deleteAll');
    Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');

    //Tabungan
    Route::resource('tabungan', TabunganController::class);
    Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan.index');
    Route::delete('/tabungan', [TabunganController::class, 'deleteAll'])->name('tabungan.deleteAll');
    Route::post('/tabungan/storeMulti', [TabunganController::class, 'storeMulti'])->name('tabungan.storeMulti');

    Route::resource('kelas10', Kelas10Controller::class);
    Route::get('/kelas10', [Kelas10Controller::class, 'index'])->name('kelas10.index');

    Route::resource('kelas11', Kelas11Controller::class);
    Route::get('/kelas11', [Kelas11Controller::class, 'index'])->name('kelas11.index');

    Route::resource('kelas12', Kelas12Controller::class);
    Route::get('/kelas12', [Kelas12Controller::class, 'index'])->name('kelas12.index');

    Route::resource('totalpersiswa', TotalPerSiswaController::class);
    Route::get('/totalpersiswa', [TotalPerSiswaController::class, 'index'])->name('totalpersiswa.index');
    Route::get('/totalpersiswa/{siswa:slug}', [TotalPerSiswaController::class, 'show']);

    Route::resource('petunjuk', PetunjukController::class);
    Route::get('/petunjuk', [PetunjukController::class, 'index'])->name('petunjuk.index');
});

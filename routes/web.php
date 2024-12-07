<?php


use App\Http\Controllers\IndexController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pegawaiController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\PresensiSiswaController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('auth.login'); 

});
Route::get('auth/login', [LoginController::class, 'loginBackend'])
->name('auth.login'); 
Route::post('auth/login', [LoginController::class, 'authenticateBackend'])
->name('auth.login'); 
Route::post('auth/logout', [LoginController::class, 'logoutBackend'])
->name('auth.logout');

Route::middleware(['auth', 'akses:1'])->group(function () {
    Route::get('/beranda', [IndexController::class, 'authBeranda'])->name('beranda');
    Route::resource('pegawai', pegawaiController::class);
    Route::resource('kelas', kelasController::class);
    Route::resource('siswa', siswaController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('user', userController::class);
    Route::get('user/get-pegawai/{nip}', [UserController::class, 'getPegawai']);
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [userController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');



});


// Route::middleware('auth')->group(function () {
//     Route::get('/presensi', [PresensiSiswaController::class, 'index'])->name('presensi.index');
//     Route::post('/presensi', [PresensiSiswaController::class, 'store'])->name('presensi.store');
// });


Route::middleware(['auth', 'akses:0'])->group(function () {
    Route::get('/dashboard', [PegawaiController::class, 'dashboard'])->name('dashboard');
    Route::get('/presensi', [PresensiSiswaController::class, 'index'])->name('presensi.index');
    Route::post('/presensi', [PresensiSiswaController::class, 'store'])->name('presensi.store');
    Route::post('/presensi/clockin', [PresensiController::class, 'clockIn'])->name('presensi.clockin');
    Route::post('/presensi/clockout', [PresensiController::class, 'clockOut'])->name('presensi.clockout');
    Route::get('/absensi', [AbsensiController::class, 'absensi'])->name('absensi');

});











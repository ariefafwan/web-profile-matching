<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PertanyaanController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Middleware Admin
    Route::middleware(['admin'])->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin');
        //Aspek
        Route::get('admin/seluruhaspek', [AdminController::class, 'seluruhaspek'])->name('seluruhaspek');
        Route::get('admin/createaspek', [AdminController::class, 'createaspek'])->name('createaspek');
        Route::post('admin/createaspek', [AdminController::class, 'storeaspek'])->name('storeaspek');
        Route::get('admin/editaspek/{id}', [AdminController::class, 'editaspek'])->name('editaspek');
        Route::post('admin/editaspek/{id}/update', [AdminController::class, 'updateaspek'])->name('updateaspek');
        Route::post('admin/editaspek/{id}/destroy', [AdminController::class, 'destroyaspek'])->name('destroyaspek');
        //Kriteria
        Route::get('admin/kriteria', [AdminController::class, 'kriteria'])->name('kriteria');
        Route::get('admin/createkriteria', [AdminController::class, 'createkriteria'])->name('createkriteria');
        Route::post('admin/createkriteria', [AdminController::class, 'storekriteria'])->name('storekriteria');
        Route::get('admin/editkriteria/{id}', [AdminController::class, 'editkriteria'])->name('editkriteria');
        Route::post('admin/editkriteria/{id}/update', [AdminController::class, 'updatekriteria'])->name('updatekriteria');
        Route::post('admin/editkriteria/{id}/destroy', [AdminController::class, 'destroykriteria'])->name('destroykriteria');
        //Pertanyaan
        Route::resource('admin/pertanyaan', PertanyaanController::class);
        Route::get('getkriteria/{id}', [AdminController::class, 'getkriteria']);
        //Bobot
        Route::get('admin/bobot', [AdminController::class, 'bobot'])->name('bobot');
        //Cacah Hasil
        Route::get('getpertanyaan/{id}', [AdminController::class, 'getpertanyaan']);
        Route::get('admin/hasil/create', [AdminController::class, 'hasil'])->name('tambahhasil');
        Route::post('admin/hasil/create', [AdminController::class, 'storehasil'])->name('storehasil');
        Route::get('admin/hasil/index', [AdminController::class, 'evaluasihasil'])->name('hasil');
        Route::get('admin/hasil/edit/{id}', [AdminController::class, 'edithasil'])->name('edithasil');
        Route::post('admin/hasil/edit/{id}/update', [AdminController::class, 'updatehasil'])->name('updatehasil');
        Route::post('admin/hasil/edit/{id}/destroy', [AdminController::class, 'destroyhasil'])->name('destroyhasil');
        //Tabel Cacah
        Route::get('admin/hasil/table', [AdminController::class, 'tabelcacah'])->name('tabelcacah');
        //Perhitungan
        Route::get('admin/perhitungan', [AdminController::class, 'perhitungan'])->name('perhitungan');
        //NT & Rangking
        Route::post('admin/perhitungan', [AdminController::class, 'storetotal'])->name('storetotal');
        Route::get('admin/nt-ranking', [AdminController::class, 'ranking'])->name('ranking');

        Route::get('admin/pegawai', [AdminController::class, 'pegawai'])->name('pegawai');
        Route::post('admin/pegawai/{id}', [AdminController::class, 'destroypegawai'])->name('destroypegawai');

        //import data
        Route::post('admin/import', [AdminController::class, 'importuser'])->name('user.import');
        Route::post('admin/seluruhaspek/import', [AdminController::class, 'importaspek'])->name('aspek.import');
        Route::post('admin/kriteria/import', [AdminController::class, 'importkriteria'])->name('kriteria.import');
        Route::post('admin/hasil/index/import', [AdminController::class, 'importhasil'])->name('hasil.import');
        Route::post('admin/bobotpertanyaan/import', [AdminController::class, 'importpertanyaan'])->name('bobotpertanyaan.import');
        Route::post('admin/perhitungan/import', [AdminController::class, 'importranking'])->name('ranking.import');

        //export data
        Route::get('admin/pegawai/export', [AdminController::class, 'exportuser'])->name('user.export');
        Route::get('admin/seluruhaspek/export', [AdminController::class, 'exportaspek'])->name('aspek.export');
        Route::get('admin/kriteria/export', [AdminController::class, 'exportkriteria'])->name('kriteria.export');
        Route::get('admin/hasil/index/export', [AdminController::class, 'exporthasil'])->name('hasil.export');
        Route::get('admin/bobotpertanyaan/export', [AdminController::class, 'exportpertanyaan'])->name('bobotpertanyaan.export');
        Route::get('admin/perhitungan/export', [AdminController::class, 'exportranking'])->name('ranking.export');
        // Route::get('admin/test', [AdminController::class, 'test'])->name('test');
    });

    //Middleware User
    Route::middleware(['user'])->group(function () {
        Route::get('user/dashboard', [UserController::class, 'index'])->name('user');
        Route::resource('user/profile', ProfileController::class);
    });

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

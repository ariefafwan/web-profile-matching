<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PertanyaanController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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
            //Krietria
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
            //Hasil
            Route::get('getpertanyaan/{id}', [AdminController::class, 'getpertanyaan']);
            Route::get('admin/hasil/create', [AdminController::class, 'hasil'])->name('tambahhasil');
            Route::post('admin/hasil/create', [AdminController::class, 'storehasil'])->name('storehasil');
            Route::get('admin/hasil/index', [AdminController::class, 'evaluasihasil'])->name('hasil');
            Route::get('admin/hasil/edit/{id}', [AdminController::class, 'edithasil'])->name('edithasil');
            Route::post('admin/hasil/edit/{id}/update', [AdminController::class, 'updatehasil'])->name('updatehasil');
            Route::post('admin/hasil/edit/{id}/destroy', [AdminController::class, 'destroyhasil'])->name('destroyhasil');
        });

        //Middleware User
        Route::middleware(['user'])->group(function () {
            Route::get('user/dashboard', [UserController::class, 'index'])->name('user');
            Route::resource('user/profile', ProfileController::class);
            
        });

    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

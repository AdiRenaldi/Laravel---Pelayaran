<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\kariawanController;
use App\Http\Controllers\loginController;
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

Route::middleware('guest:admin,pimpinan,kariawan')->group(function () {
    Route::controller(loginController::class)->group(function () {
        Route::get('/', 'login')->name('login');
        Route::get('/login', 'login')->name('login');
        Route::post('/prosesLogin', 'prosesLogin');
    });
});
Route::middleware('auth:admin,pimpinan,kariawan')->group(function(){
    Route::get('/logout', [loginController::class, 'logout']);
    Route::middleware('admin')->group(function () {
        Route::controller(adminController::class)->group(function () {
            Route::get('/dashboard-admin', [kariawanController::class, 'dashboard']);
            Route::get('/halaman-user', 'halamanUser');
            Route::get('/tambah-pimpinan', 'tambahPimpinan');
            Route::post('/prosesTambahPimpinan', 'prosestambahPimpinan');
            Route::get('/tambah-kariawan', 'tambahKariawan');
            Route::post('/prosesTambahKariawan', 'prosestambahKariawan');

            Route::get('/edit-pimpinan/{id}', 'editPimpinan');
            Route::post('/prosesEditPimpinan/{id}','prosesEditPimpinan');
            Route::get('/edit-kariawan/{id}', 'editKariawan');
            Route::post('/prosesEditKariawan/{id}','prosesEditKariawan');
            Route::get('/hapus-pimpinan/{id}', 'hapusPimpinan');
            Route::get('/hapus-kariawan/{id}', 'hapusKariawan');
        });
    });

    Route::middleware('kariawan')->group(function () {
        Route::controller(kariawanController::class)->group(function () {
            Route::get('/ubah-password', [loginController::class, 'ubahPassword']);
            Route::post('/prosesUbahPassword', [loginController::class, 'prosesUbahPassword']);

            Route::get('/dashboard-kariawan', 'dashboard');

            Route::get('/list-kapal', 'listKapal');
            Route::get('/tambah-kapal', 'tambahKapal');
            Route::post('/prosesTambah', 'prosesTambah');
            Route::get('/edit-kapal/{slug}', 'editKapal');
            Route::put('/prosesEdit/{slug}', 'prosesEdit');
            Route::get('/hapus-kapal/{slug}', 'hapusKapal');

            Route::get('/peringkat', 'peringkat');
            Route::get('/testing', 'testing');
            Route::get('/ulang', 'testing');

        });
    });

    Route::middleware('pimpinan')->group(function () {
        Route::controller(adminController::class)->group(function () {
            Route::get('/ubah-passwordp', [loginController::class, 'ubahPassword']);
            Route::post('/prosesUbahPasswordp', [loginController::class, 'prosesUbahPassword']);

            Route::get('/dashboard-pimpinan', [kariawanController::class, 'dashboard']);
            Route::get('/testing-pimpinan', [kariawanController::class, 'testing']);
        });
    });

});
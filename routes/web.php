<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\BarangprosesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;


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

Route::get('/',[LayoutController::class,'index'])->middleware('auth');
Route::get('/home',[LayoutController::class,'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login.proses','proses');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => ['auth']],function(){
    Route::group(['middleware'=> ['CekUserLogin:admin']],function(){
    Route::resource('/barang', BarangController::class);
    Route::resource('/user', UserController::class); 
    Route::resource('/customer', CustomerController::class); 

    });

    Route::group(['middleware'=> ['CekUserLogin:qa_staff']], function() {
        Route::resource('barang', BarangController::class);
        Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/barangproses', [BarangprosesController::class, 'index'])->name('barangproses.index');
        Route::get('/barangselesaistaff', [BarangprosesController::class, 'halamanselesaiStaff'])->name('barangselesai/staff');
        Route::put('barangproses/update/{id}/{status}', [BarangprosesController::class, 'update'])->name('barang.update');
        Route::get('/print', [BarangProsesController::class, 'printPDF'])->name('barang.print');
        Route::get('/perbaikanstaff', [BarangprosesController::class, 'halamanperbaikanStaff'])->name('barangperbaikan/perbaikanStaff');
    });
    

Route::group(['middleware'=> ['CekUserLogin:qa_leader']],function(){
    Route::get('/perbaikan', [BarangprosesController::class, 'halamanperbaikan'])->name('barangperbaikan/perbaikan');
    Route::get('/barangselesai', [BarangprosesController::class, 'halamanselesai'])->name('barangselesai/selesai');
    Route::post('/barang/{barang}/validate', [BarangController::class, 'validateBarang'])->name('barang.validateBarang');

    });
});




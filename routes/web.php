<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/barang', [BarangController::class, 'index'])->name('barang.index');
Route::post('/admin/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::get('/admin/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/admin/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/admin/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::get('/admin/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::post('/admin/supplier', [SupplierController::class, 'store'])->name('supplier.store');
Route::delete('/admin/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin/products')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.products.index');
    Route::get('create', [AdminController::class, 'create'])->name('admin.products.create');
    Route::post('store', [AdminController::class, 'store'])->name('admin.products.store');
    Route::get('{product}/edit', [AdminController::class, 'edit'])->name('admin.products.edit');
    Route::put('{product}', [AdminController::class, 'update'])->name('admin.products.update');
    Route::get('delete', [AdminController::class, 'delete'])->name('admin.products.delete');
    Route::delete('/', [AdminController::class, 'destroy'])->name('admin.products.destroy');
});


<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('auth/register', [PassportAuthController::class, 'register'])->name('register');


Route::prefix('auth')->middleware(['auth'])->group(function () {
    Route::post('login', [PassportAuthController::class, 'login'])->name('login');
//    Route::get('login', [PassportAuthController::class, 'login'])->name('login');
    Route::post('refresh', [PassportAuthController::class, 'refresh'])->name('refresh');
});


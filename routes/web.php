<?php

use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Front\ServiceController;
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


Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource("news", NewsController::class);
    Route::resource("projects", ProjectController::class);
    Route::resource("services", ServiceController::class);

    Route::get("contact", [ContactController::class, 'index'])->name('contact.index');
    Route::get("contact/{contact}", [ContactController::class, 'show'])->name('contact.show');
});

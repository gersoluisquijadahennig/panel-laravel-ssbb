<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserPanelController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::group(['prefix' => 'user'], function () {
    Route::get('/show', [UserController::class, 'show'])->name('user.show');
    Route::get('/index',[UserPanelController::class, 'index'])->name('user.index');
    Route::get('/edit/{edit?}', [UserPanelController::class, 'edit'])->name('user.edit');
    // Otras rutas relacionadas con el usuario
});

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HWController;

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
    return view('pages.home');
})->name('home');

Route::get('/about', function (){
    return view('pages.info.about');
})->name('info.about');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'auth']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/user/dashboard', [UserController::class, 'dashboard'])
    ->middleware('auth')
    ->name('user.dashboard');

Route::get('/contacts', function(){
    return view('pages.contacts.contacts');
})->name('contacts.contacts');

Route::get('/users/{id?}', [UserController::class, 'get_user'])
    ->where('id', '[0-9]+')
    ->name('user.show');

Route::get('/users/all', [HomeController::class, 'get_all_users']);
Route::get('/users/store', [HomeController::class, 'user_store']);


/// HW #15
//1.1
//Route::get('/plus/{a}/{b}', [HWController::class, 'plus']);
Route::get('/plus/{a}/{b}', [HomeController::class, 'plus']);

//1.2
//Route::get('/multiply/{a}/{b}', [HWController::class, 'multiply']);
Route::get('/multiply/{a}/{b}', [HomeController::class, 'multiply']);
Route::get('/multiply/{a}', [HomeController::class, 'multiplyDefault']);

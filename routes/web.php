<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/login', function(){
    return redirect()->route('home');
})->name('login');

Route::get('/contacts', function(){
    return view('pages.contacts.contacts');
})->name('contacts.contacts');

Route::get('/users/{id?}', function ($id = 0){
    return "<h1>User: ".$id."</h1>";
});

Route::get('/users/{id?}', [HomeController::class, 'get_user'])
    ->where('id', '[0-9]+');

Route::get('/user/dashboard', function(){
    return "user dashboard";
})
->middleware('auth')
->name('user.dashboard');

Route::get('/users/all', [HomeController::class, 'get_all_users']);
Route::get('/users/store', [HomeController::class, 'user_store']);
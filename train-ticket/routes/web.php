<?php

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
    return view('user.home');
})->name('home');

Route::get('/trains', function () {
    return view('user.trains');
})->name('trains');

Route::get('/loyalty', function () {
    return view('user.loyalty');
})->name('loyalty');

Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');


// admin panel routes
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin dashboard');

Route::get('/admin/trains', function () {
    return view('admin.trains');
})->name('admin trains');

Route::get('/admin/addtrain', function () {
    return view('admin.addtrain');
})->name('admin add trains');

Route::get('/admin/users', function () {
    return view('admin.users');
})->name('admin users');

Route::get('/admin/tickets', function () {
    return view('admin.tickets');
})->name('admin users');


Route::get('/admin/loyalitydiscount', function () {
    return view('admin.loyalitydiscount');
})->name('admin loyalitydiscount');

Route::get('/admin/loyalbadge', function () {
    return view('admin.loyalbadge');
})->name('admin loyalbadge');











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home1');

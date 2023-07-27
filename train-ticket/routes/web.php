<?php

use Illuminate\Support\Facades\Route;
use App\Train;
use App\User;
use App\Passenger;
use App\LoyaltyDiscount;






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


// all trains page
Route::get('/trains', function () {
    // Fetch the train model data where is_active == 1
    $trains = Train::where('is_active', 1)->get();

    return view('user.trains', ['trains' => $trains]);
})->name('trains');

//home page search

//Route::post('/', 'UserController@searchtrain')->name('search');
Route::post('/search', 'UserController@searchtrain')->name('home/search');

//live location

Route::get('/livelocation/{id}', 'UserController@liveLocation')->name('livelocation');




Route::get('/loyalty', function () {
    return view('user.loyalty');
})->name('loyalty');

Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

//user panel

Route::get('/userpanel', 'PassengerController@userpanel')->name('userpanel');



///////////////////////////////////////////////////// admin panel routes ////////////////////////////////////////////////////////////////////////
Route::get('/admin', 'AdminController@dashboard')->name('admin');


Route::get('/admin/trains', 'AdminController@view_train')->name('admin/trains');
Route::get('/admin/trains/deactive/{id}', 'AdminController@train_deactive')->name('admin/trains/deactive');

Route::get('/admin/addtrain', 'AdminController@addtrain')->name('admin add trains');

Route::post('/admin/addtrain/save', 'AdminController@save_train')->name('admin/addtrain/save');


// all users table
Route::get('/admin/users', 'AdminController@users')->name('admin users');


//tickets view
Route::get('/admin/tickets', 'AdminController@showtickets')->name('/admin/tickets');


// discount
Route::get('/admin/loyalitydiscount', 'AdminController@loyaltydiscount')->name('admin.loyaltydiscount');


//discount edit
Route::get('/admin/loyalitydiscount/edit/{id}', 'AdminController@loyalitydiscountedit')->name('/admin/loyalitydiscount/edit');

Route::post('/admin/loyalitydiscount/edit/save', 'AdminController@loyalitydiscounteditsave')->name('/admin/loyalitydiscount/edit/save');











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home1');

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

Route::post('/', 'PassengerController@searchtrain')->name('search');

//live location

Route::get('/livelocation/{id}', 'PassengerController@liveLocation')->name('livelocation');

//send mail

Route::get('/sendmail', 'PassengerController@sendmail')->name('sendmail');




Route::get('/loyalty', function () {
    return view('user.loyalty');
})->name('loyalty');

Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

Route::get('/userpanel', function () {
    return view('user.userpanel');
})->name('userpanel');

Route::get('/livelocation', function () {
    return view('user.livelocation');
})->name('livelocation');


///////////////////////////////////////////////////// admin panel routes ////////////////////////////////////////////////////////////////////////
Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin');


Route::get('/admin/trains', 'AdminController@view_train')->name('admin/trains');
Route::get('/admin/trains/deactive/{id}', 'AdminController@train_deactive')->name('admin/trains/deactive');

Route::get('/admin/addtrain', function () {
    return view('admin.addtrain');
})->name('admin add trains');

Route::post('/admin/addtrain/save', 'AdminController@save_train')->name('admin/addtrain/save');


// all users table
Route::get('/admin/users', function () {
    $users = User::with(['passengers' => function ($query) {
        $query->withCount('tickets');
    }])->where('type', 'Passenger')->get();

    return view('admin.users', ['users' => $users]);
})->name('admin users');


//tickets view




Route::get('/admin/tickets', 'AdminController@showtickets')->name('/admin/tickets');


// discount

Route::get('/admin/loyalitydiscount', function () {
    $loyaltyDiscounts = LoyaltyDiscount::all();
    return view('admin.loyalitydiscount', ['loyaltyDiscounts' => $loyaltyDiscounts]);
})->name('admin.loyaltydiscount');


//discount edit
Route::get('/admin/loyalitydiscount/edit', 'AdminController@loyalitydiscountedit')->name('/admin/loyalitydiscount/edit');











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home1');

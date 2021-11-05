<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



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

Route::get('/', 'HomeController@index');
Route::get('/product/{int}', 'HomeController@getProduct');

Route::get('/workers/dataentry', function () {
    return view('workersdata');
});
Route::get('/dashboard','DashboardController@index');

// All routes for Views 
Route::name('dashboard.')->group(function () {

    Route::get('/addworker', function () {
        return view('dashboard.AddWorker');
    });
    Route::get('/viewallworkers', function () {
        return view('dashboard.ViewAllWorkers');
    });
    Route::get('/activitylog', function () {
        return view('dashboard.Activity');
    });
    Route::get('/viewhistory', 'DashboardController@viewHistory');
    Route::post('/viewhistory', 'DashboardController@viewHistory');
    Route::post('/addexpense','HomeController@addExpense');
    Route::get('/delete/expense/{int}','HomeController@deleteExpense');
});

Route::resource('products', 'ProductsController');
Route::resource('category', 'CategoryController');
Route::resource('stock', 'StockController');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

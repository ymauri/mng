<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('', function () {
    if (Auth::user()) {
        return redirect("home");
    }
    return redirect('login');
});

Route::get('/', 'PagesController@index')->middleware(['web', 'auth'])->name('home');


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

Auth::routes();

// Manage User
Route::name('user.')->middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'UserController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'UserController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'UserController@create')->name('create')->middleware('permission:configuration');
    Route::post('/delete/{user}', 'UserController@delete')->name('delete')->middleware('permission:configuration');
    Route::get('/edit/{user}', 'UserController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{user}', 'UserController@update')->name('update')->middleware('permission:configuration');
});

// Manage Role
Route::name('role.')->middleware(['auth'])->prefix('role')->group(function () {
    Route::get('/', 'RoleController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'RoleController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'RoleController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'RoleController@create')->name('create')->middleware('permission:configuration');
    Route::post('/delete/{role}', 'RoleController@delete')->name('delete')->middleware('permission:configuration');
    Route::get('/edit/{role}', 'RoleController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{role}', 'RoleController@update')->name('update')->middleware('permission:configuration');
});

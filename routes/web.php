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
Route::name('user.')->prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::post('/dt', 'UserController@dt')->name('datatable');
    Route::get('/add', 'UserController@add')->name('add');
    Route::post('/create', 'UserController@create')->name('create');
    Route::post('/delete/{user}', 'UserController@delete')->name('delete');
    Route::get('/edit/{user}', 'UserController@edit')->name('edit');
    Route::post('/update/{user}', 'UserController@update')->name('update');
});

// Manage Role
Route::name('role.')->prefix('role')->group(function () {
    Route::get('/', 'RoleController@index')->name('index');
    Route::post('/dt', 'RoleController@dt')->name('datatable');
    Route::get('/add', 'RoleController@add')->name('add');
    Route::post('/create', 'RoleController@create')->name('create');
    Route::post('/delete/{role}', 'RoleController@delete')->name('delete');
    Route::get('/edit/{role}', 'RoleController@edit')->name('edit');
    Route::post('/update/{role}', 'RoleController@update')->name('update');
});

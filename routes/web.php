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

// Route::get('/login', 'Auth\LoginController@login')->name('login');
// Route::post('/login', 'Auth\LoginController@authenticate')->name('authenticate');
// Route::post('/logout', 'Auth\LoginController@logout')->middleware(['web', 'auth'])->name('logout');
// Route::post('/register', 'Auth\RegisterController@register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

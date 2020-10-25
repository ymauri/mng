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

//Comands
Route::name('cc.')->prefix('cc')->group(function () {
    Route::get('/cc', 'CcController@clearCache')->name('cc');
    Route::get('/spatie', 'CcController@clearSpatie')->name('spatie');
    Route::get('/migrate/{param?}', 'CcController@migrate')->name('migrate');
    Route::get('/seed/{class}', 'CcController@seed')->name('seed');
});

// Manage User
Route::name('user.')->middleware(['auth','web'])->prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'UserController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'UserController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'UserController@create')->name('create')->middleware('permission:configuration');
    Route::post('/delete/{user}', 'UserController@delete')->name('delete')->middleware('permission:configuration');
    Route::get('/edit/{user}', 'UserController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{user}', 'UserController@update')->name('update')->middleware('permission:configuration');
});

// Manage Role
Route::name('role.')->middleware(['auth','web'])->prefix('role')->group(function () {
    Route::get('/', 'RoleController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'RoleController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'RoleController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'RoleController@create')->name('create')->middleware('permission:configuration');
    Route::post('/delete/{role}', 'RoleController@delete')->name('delete')->middleware('permission:configuration');
    Route::get('/edit/{role}', 'RoleController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{role}', 'RoleController@update')->name('update')->middleware('permission:configuration');
});

// Manage Staff
Route::name('staff.')->middleware(['auth','web'])->prefix('staff')->group(function () {
    Route::get('/', 'WorkerController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'WorkerController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'WorkerController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'WorkerController@create')->name('create')->middleware('permission:configuration');
    Route::post('/delete/{worker}', 'WorkerController@delete')->name('delete')->middleware('permission:configuration');
    Route::get('/edit/{worker}', 'WorkerController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{worker}', 'WorkerController@update')->name('update')->middleware('permission:configuration');
});

// Manage Source
Route::name('source.')->middleware(['auth','web'])->prefix('source')->group(function () {
    Route::get('/', 'SourceController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'SourceController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'SourceController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'SourceController@create')->name('create')->middleware('permission:configuration');
    Route::post('/delete/{source}', 'SourceController@delete')->name('delete')->middleware('permission:configuration');
    Route::get('/edit/{source}', 'SourceController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{source}', 'SourceController@update')->name('update')->middleware('permission:configuration');
});

// Manage Listing
Route::name('listing.')->middleware(['auth','web'])->prefix('listing')->group(function () {
    Route::get('/', 'ListingController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'ListingController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'ListingController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'ListingController@create')->name('create')->middleware('permission:configuration');
    Route::get('/edit/{listing}', 'ListingController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{listing}', 'ListingController@update')->name('update')->middleware('permission:configuration');
});

// Manage Help Content
Route::name('help.')->middleware(['auth','web'])->prefix('help')->group(function () {
    Route::get('/', 'HelpController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'HelpController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'HelpController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'HelpController@create')->name('create')->middleware('permission:configuration');
    Route::post('/delete/{help}', 'HelpController@delete')->name('delete')->middleware('permission:configuration');
    Route::get('/edit/{help}', 'HelpController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{help}', 'HelpController@update')->name('update')->middleware('permission:configuration');
});


// Manage Parameters
Route::name('parameters.')->middleware(['auth','web'])->prefix('parameters')->group(function () {
    Route::get('/', 'ParametersController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'ParametersController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'ParametersController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'ParametersController@create')->name('create')->middleware('permission:configuration');
    Route::post('/delete/{parameters}', 'ParametersController@delete')->name('delete')->middleware('permission:configuration');
    Route::get('/edit/{parameters}', 'ParametersController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{parameters}', 'ParametersController@update')->name('update')->middleware('permission:configuration');
});

//Manage Reservations
Route::name('reservations.')->middleware(['auth','web'])->prefix('reservations')->group(function () {
    Route::get('/', 'ReservationsController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'ReservationsController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/show/{checkin}', 'ReservationsController@show')->name('show')->middleware('permission:configuration');
});


// Manage Parameters
Route::name('blacklist.')->middleware(['auth','web'])->prefix('blacklist')->group(function () {
    Route::get('/', 'BlackListController@index')->name('index')->middleware('permission:configuration');
    Route::post('/dt', 'BlackListController@dt')->name('datatable')->middleware('permission:configuration');
    Route::get('/add', 'BlackListController@add')->name('add')->middleware('permission:configuration');
    Route::post('/create', 'BlackListController@create')->name('create')->middleware('permission:configuration');
    Route::post('/delete/{blacklist}', 'BlackListController@delete')->name('delete')->middleware('permission:configuration');
    Route::get('/edit/{blacklist}', 'BlackListController@edit')->name('edit')->middleware('permission:configuration');
    Route::post('/update/{blacklist}', 'BlackListController@update')->name('update')->middleware('permission:configuration');
});

// Pricing
Route::name('pricing.')->middleware(['auth','web'])->prefix('pricing')->group(function () {
    Route::get('/', 'PricingController@index')->name('index')->middleware('permission:configuration');
    Route::post('/filter', 'PricingController@filter')->name('filter')->middleware('permission:configuration');
});

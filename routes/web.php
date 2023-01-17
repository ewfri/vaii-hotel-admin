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

Route::get('/', function () {
    return view('client/index');
});

Route::get('/gastronomia', function () {
    return view('client/gastronomia');
});

Route::get('/wellness', function () {
    return view('client/wellness');
});

Route::get('/kontakt', function () {
    return view('client/kontakt');
});

Route::get('/rezervacia', function () {
    return view('client/rezervacia');
});

Route::post('/contactus',[\App\Http\Controllers\SpravaController::class, 'store']);
Route::post('/reservation',[\App\Http\Controllers\RezervaciaController::class, 'reserve']);
Route::get('/ubytovanie',[\App\Http\Controllers\IzbaController::class, 'load']);

Auth::routes();


//len prihlasený
Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('admin/rezervacie', 'RezervaciaController');
    Route::resource('admin/izby', 'IzbaController');
    Route::resource('admin/zamestnanci', 'ZamestnanecController');
    Route::get('admin/spravy', [\App\Http\Controllers\SpravaController::class, 'index']);
    Route::get('admin/spravy/fetch-messages', [\App\Http\Controllers\SpravaController::class, 'fetchmessages']);
    Route::get('admin/spravy/reviewMessage/{id}', [\App\Http\Controllers\SpravaController::class, 'reviewMessage']);
    Route::put('admin/spravy/sendEmail/{id}', [\App\Http\Controllers\SpravaController::class, 'sendEmail']);
});

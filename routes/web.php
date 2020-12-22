<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\UserControllers;
use App\Http\Controllers\User\Ticketcontroller;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// admin Routes
Route::prefix('admin')->name('admin.')->middleware('can:admin')->group(function (){
    Route::resource('/user', UserController::class, ['except' => ['show', 'store']]);
});

//User Routes
Route::prefix('users')->name('users.')->group(function (){
    Route::resource('/user', UserControllers::class);
    //custom controller
    Route::get('tickets/export', [Ticketcontroller::class, 'export'])->name('ticket.export_excel');
    Route::resource('tickets', Ticketcontroller::class);

});

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrgaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');




//Auth

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'orga'])->name('registerpr');
Route::get('/registercl',[RegisterController::class,'cli'])->name('registercl');
Route::post('/registercl',[RegisterController::class,'client'])->name('registercli');
Route::get('/login',[RegisterController::class,'login'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');




Route::get('/choose',[RegisterController::class,'choose'])->name('choose');
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [SessionController::class,'logout'])->name('logout');
});






//Organisateur Routes

Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::controller(OrgaController::class)->group(function () {
        Route::get('/dashboard_orga', 'dashboard')->name('orga.dash');
    });
});



//Clients Routes

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::get('/myReservation', 'myReser')->name('client.resers');
    });
});


//Admin Routes

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin_dash', 'dashboard')->name('admin.dash');
        Route::get('/admin_users', 'users')->name('admin.users');
        Route::get('/admin_cates', 'categories')->name('admin.cats');
        Route::get('/admin_events', 'events')->name('admin.events');
    });
});
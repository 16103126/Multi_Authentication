<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\MangerController;
use App\Http\Controllers\Auth\Login\CustomerLoginController;
use App\Http\Controllers\Auth\Login\EmployeeLoginController;
use App\Http\Controllers\Auth\Login\MangerLoginController;
use App\Http\Controllers\Auth\Registration\CustomerRegistrationController;
use App\Http\Controllers\Auth\Registration\EmployeeRegistrationController;
use App\Http\Controllers\Auth\Registration\MangerRegistrationController;

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


Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');

    //<-----------------------------Customer Login Route-------------------------------->
   // Route::get('/login/form', [CustomerLoginController::class, 'showLoginForm'])->name('login');
    Route::get('/login/form', [CustomerLoginController::class, 'showLoginForm'])->name('customer.login');
    Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.login.submit');
    Route::get('/logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');

    //<-----------------------------Customer Registration Route-------------------------------->
    Route::get('/registration/form', [CustomerRegistrationController::class, 'showRegistrationForm'])->name('customer.registration');
    Route::post('/registration', [CustomerRegistrationController::class, 'registration'])->name('customer.registration.submit');

});

Route::prefix('employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employee.index');

    //<-----------------------------Employee Login Route-------------------------------->
    Route::get('/login/form', [EmployeeLoginController::class, 'showLoginForm'])->name('employee.login');
    Route::post('/login', [EmployeeLoginController::class, 'login'])->name('employee.login.submit');
    Route::get('/logout', [EmployeeLoginController::class, 'logout'])->name('employee.logout');

    //<-----------------------------Employee Registration Route-------------------------------->
    Route::get('/registration/form', [EmployeeRegistrationController::class, 'showRegistrationForm'])->name('employee.registration');
    Route::post('/registration', [EmployeeRegistrationController::class, 'registration'])->name('employee.registration.submit');
});

Route::prefix('manger')->group(function () {
    Route::get('/', [MangerController::class, 'index'])->name('manger.index');

    //<-----------------------------Manger Login Route-------------------------------->
    Route::get('/login/form', [MangerLoginController::class, 'showLoginForm'])->name('manger.login');
    Route::post('/login', [MangerLoginController::class, 'login'])->name('manger.login.submit');
    Route::get('/login', [MangerLoginController::class, 'logout'])->name('manger.logout');

    //<-----------------------------Employee Registration Route-------------------------------->
    Route::get('/registration/form', [MangerRegistrationController::class, 'showRegistrationForm'])->name('manger.registration');
    Route::post('/registration', [MangerRegistrationController::class, 'registration'])->name('manger.registration.submit');
});
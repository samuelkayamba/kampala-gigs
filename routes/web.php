<?php

use Illuminate\Session\Store;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingsController;
use App\Http\Controllers\UserController;

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
//Main Page
Route::get('/', [ListingsController::class, 'index']);
//show create form
Route::get('/List/create',[ListingsController::class,'create'])->middleware('auth');
//Store a list Data
Route::post('/List',[ListingsController::class, 'store'])->middleware('auth');
//Show Edit form
Route::get('/List/{id}/edit',[ListingsController::class, 'edit'])->middleware('auth');
//Update List
Route::put('/List/{Listing}', [ListingsController::class, 'update'])->middleware('auth');
//Delete a List
Route::delete('/List/{Listing}', [ListingsController::class, 'destroy'])->middleware('auth');
// Manage Listings
Route::get('/listings/manage', [ListingsController::class, 'manage'])->middleware('auth');
//Showing a single List
Route::get('/List/{Listing}',[ListingsController::class, 'show']);
//Show Registration Form
Route::get('/register',[UserController::class, 'register'])->middleware('guest');
//Registering a New User
Route::post('/users',[UserController::class, 'store'])->middleware('guest');
// User Logging Out
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');
// Display the login form
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
// Process login credentials
Route::post('/user/authenticate', [UserController::class, 'login']);
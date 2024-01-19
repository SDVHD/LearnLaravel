<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

//Show all Listings
Route::get('/', [ListingController::class, 'index']);

//Show Create Form
Route::get('/listings/create', [ListingController::class, 'create']);

//Show Store new Listing
Route::post('/listings', [ListingController::class, 'store']);

//Show Store new Listing
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

//Show single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//Show User Registration
Route::get('/register', [UserController::class, 'create']); 

//Create new User
Route::post('/users', [UserController::class, 'store']);

//Logout User
Route::post('/logout', [UserController::class, 'logout']);
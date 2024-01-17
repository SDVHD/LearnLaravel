<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

use App\Models\Listing;

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

//Show single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);
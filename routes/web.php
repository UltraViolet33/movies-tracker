<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\MovieController;

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
    return view('welcome');
});



Route::get("/movies", [MovieController::class, "index"])->middleware(["auth", "verified"])->name("movies.index");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


Route::post("/movies", [MovieController::class, "index"])->name("movie.search");

Route::post("/movies/seen", [MovieController::class, "addSeenMovie"])->name("add.movie.seen");
Route::get("/my-movies", [MovieController::class, "getSeenMovies"])->name("movies.seen");




require __DIR__ . '/auth.php';

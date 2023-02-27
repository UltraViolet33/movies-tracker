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

Route::get("/", [MovieController::class, "index"])->middleware(["auth", "verified"])->name("movies.index");
Route::get("/movies", [MovieController::class, "index"])->middleware(["auth", "verified"])->name("movies.index");
Route::post("/movies", [MovieController::class, "index"])->name("movie.search")->middleware(["auth", "verified"]);

Route::get("/movies/details/{title}", [MovieController::class, "displayMovieDetails"])->middleware(["auth", "verified"])->name("movies.details");


Route::post("/movies/seen", [MovieController::class, "addSeenMovie"])->middleware(['auth', 'verified'])->name("add.movie.seen");
Route::post("/movies/wish", [MovieController::class, "addWishMovie"])->middleware(['auth', 'verified'])->name("add.movie.wish");
Route::post("/movies/seen/delete", [MovieController::class, "deleteSeenMovie"])->middleware(['auth', 'verified'])->name("delete.movie.seen");

Route::post("/movies/wish/delete", [MovieController::class, "deleteWishMovie"])->middleware(['auth', 'verified'])->name("delete.movie.wish");


Route::get("/my-movies", [MovieController::class, "getSeenMovies"])->middleware(['auth', 'verified'])->name("movies.seen");

Route::get("/my-wish-list", [MovieController::class, "getWishMovies"])->middleware(['auth', 'verified'])->name("movies.wish");





require __DIR__ . '/auth.php';

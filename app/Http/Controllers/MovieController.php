<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{

    public function index(Request $request)
    {
        $movie = "";

        if (!empty($request->movie)) {
            $movie = $this->searchMovie($request->movie);
        }

        return view("movies.index", ["movie" => $movie]);
    }



    public function displayMovieDetails(string $movieTitle)
    {
        $movie = Movie::where("title", $movieTitle)->first();
        $user = User::find(Auth::user()->id);

        $isSeen = $user->seenMovies()->where('id', $movie->id)->exists();
        $isInWishList = $user->wishMovies()->where('id', $movie->id)->exists();

        return view("movies.details", ["movie" => $movie, "isSeen" => $isSeen, "isInWishList" => $isInWishList]);
    }


    public function addSeenMovie(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if (isset($request->idMovie)) {
            $movie = Movie::find($request->idMovie);
            if ($movie) {

                $user->seenMovies()->attach($movie->id);
                return redirect("/");
            }
        }

        $movie = $this->searchMovie($request->movie);
        $movie->save();
        $movie = Movie::where("title", $movie->title)->first();
        $user->seenMovies()->attach($movie->id);

        return redirect("/movies");
    }


    public function addWishMovie(Request $request)
    {
        if (isset($request->idMovie)) {
            $movie = Movie::find($request->idMovie);
            if ($movie) {
                $user = User::find(Auth::user()->id);
                $user->wishMovies()->attach($movie->id);
                return redirect("/my-wish-list");
            }
        }

        $movie = $this->searchMovie($request->movie);
        $movie->save();
        $movie = Movie::where("title", $movie->title)->first();
        $user = User::find(Auth::user()->id);
        $user->wishMovies()->attach($movie->id);

        return redirect("/movies");
    }


    private function searchMovieFromAPI(string $movieTitle)
    {
        $url = "http://www.omdbapi.com/?t=" . $movieTitle . "&apikey=" . env("API_MOVIE_KEY");
        $response = Http::get($url);
        $movieApi = $response->json();
        $movie = new Movie();

        $movie->title = $movieApi["Title"];
        $movie->year = $movieApi["Year"];
        $movie->genre = $movieApi["Genre"];
        $movie->plot = $movieApi["Plot"];
        $movie->director = $movieApi["Director"];
        $movie->imdbID = $movieApi["imdbID"];

        return $movie;
    }


    private function searchMovie(string $movieTitle): mixed
    {
        $movie = Movie::where("title", $movieTitle)->first();

        if (!$movie) {
            $movie = $this->searchMovieFromAPI($movieTitle);
        }

        return $movie;
    }


    public function getSeenMovies()
    {
        $movies = [];
        $user = User::find(Auth::user()->id);

        $movies = $user->seenMovies;
        return view("movies.seen", ["movies" => $movies]);
    }


    public function getWishMovies()
    {
        $movies = [];
        $user = User::find(Auth::user()->id);

        $movies = $user->wishMovies;
        return view("movies.wish", ["movies" => $movies]);
    }


    public function deleteWishMovie(Request $request)
    {
        $movie = Movie::find($request->idMovie);

        if ($movie) {
            $user = User::find(Auth::user()->id);

            $user->wishMovies()->detach($movie);
        }

        return redirect("/my-wish-list");
    }


    public function deleteSeenMovie(Request $request)
    {
        $movie = Movie::find($request->idMovie);

        if ($movie) {
            $user = User::find(Auth::user()->id);

            $user->seenMovies()->detach($movie);
        }

        return redirect("/my-movies");
    }
}

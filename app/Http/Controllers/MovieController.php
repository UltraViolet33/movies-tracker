<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            $url = "http://www.omdbapi.com/?t=" . $request->movie . "&apikey=" . env("API_MOVIE_KEY");
            $response = Http::get($url);
            $movie = $response->json();
            // dd($movie);
        }

        // dd($response->json());

        return view("movies.index", ["movie" => $movie]);
    }


    public function addSeenMovie(Request $request)
    {
        $movieApi = $this->searchMovie($request->movie);
        // dd($movieApi);
        $movie = new Movie();
        $movie->title = $movieApi["Title"];
        $movie->year = $movieApi["Year"];
        $movie->genre = $movieApi["Genre"];
        $movie->plot = $movieApi["Plot"];
        $movie->director = $movieApi["Director"];
        $movie->imdbID = $movieApi["imdbID"];

        $movie->save();

        $movie2 = Movie::where("title", $movieApi["Title"])->get();
        
        $user = User::find(Auth::user()->id);

        dd($user->seenMovies()->attach($movie->id));

        return redirect("/movies");
    }




    private function searchMovie(string $movieTitle): array
    {
        $url = "http://www.omdbapi.com/?t=" . $movieTitle . "&apikey=" . env("API_MOVIE_KEY");
        $response = Http::get($url);
        return $response->json();
    }
}

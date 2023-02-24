<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;


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
        // dd($request->movie);
        $movie = $this->searchMovie($request->movie);

    }




    private function searchMovie(string $movieTitle): array
    {
        $url = "http://www.omdbapi.com/?t=" . $movieTitle . "&apikey=" . env("API_MOVIE_KEY");
        $response = Http::get($url);
        return $response->json();
    }
}

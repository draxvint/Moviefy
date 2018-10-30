<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Repository\MovieRepository;

class MovieController extends Controller
{

    function __construct(MovieRepository $movies)
    {
        $this->movies = $movies;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $movies =  $this->movies->getPopular(['language' => 'hu-HU']);
        return view('home',['movies' => $movies]);
    }

    public function show($tmdbid){

        $movie = $this->movies->load($tmdbid, ['language' => 'hu-HU']);
        return view('movie.show',['movie' => $movie]);
    }
}

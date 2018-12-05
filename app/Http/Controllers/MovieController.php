<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Tmdb\Repository\DiscoverRepository;
use Tmdb\Repository\GenreRepository;
use Tmdb\Repository\MovieRepository;
use Illuminate\Support\Facades\Auth;
use Tmdb\Repository\SearchRepository;

class MovieController extends Controller
{

    function __construct(MovieRepository $movies, GenreRepository $genres, DiscoverRepository $discover, SearchRepository $search)
    {
        $this->movies = $movies;
        $this->genres = $genres;
        $this->discover = $discover;
        $this->search = $search;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $movies =  $this->movies->getNowPlaying(['language' => 'hu-HU', 'region' => 'HU']);
        return view('home',['movies' => $movies]);
    }

    public function show($tmdbid){
        if (Auth::user()) {
            $user_playlists = Auth::user()->playlists;
        }else{
            $user_playlists = 0;
        }

        $movie = $this->movies->load($tmdbid, ['language' => 'hu-HU']);
        return view('movie.show',['movie' => $movie, 'user_playlists' => $user_playlists]);
    }

    public function showGenre($id)
    {
        $movies = $this->genres->getMovies($id,['language' => 'hu-HU']);
        return view('home',['movies' => $movies]);
    }

    public function search(Request $request)
    {
        if(!$request->filled('keyword')){
            return Redirect::route('home');
        }
        $query = new \Tmdb\Model\Search\SearchQuery\MovieSearchQuery();

        $query
            ->page(1)
            ->language('hu')
        ;
        $movies = $this->search->searchMovie($request['keyword'],$query);
        return view('home',['movies' => $movies]);
    }
}

<?php

namespace Moviefy\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Tmdb\Repository\DiscoverRepository;
use Tmdb\Repository\GenreRepository;
use Tmdb\Repository\MovieRepository;
use Illuminate\Support\Facades\Auth;
use Tmdb\Repository\SearchRepository;
use Illuminate\Support\Collection;


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

    public function recommend(){
        if(!Auth::user()){
            return view('movie.recommend' ,['error' => 'Ahhoz, hogy elérd ezt a funkciót, regisztrálj, vagy jelentkezz be!']);
        }
        if(Auth::user()->playlists->isEmpty()){
            return view('movie.recommend',['error' => "Nincs lejátszási lista!"]);   
        }
        $playlists = Auth::user()->playlists->all();
        $not_empty = [];
        foreach ($playlists as $playlist) {
            if (!$playlist->movies->isEmpty()) {
                array_push($not_empty, $playlist->id);
            }
        }
        if(empty($not_empty)){
            return view('movie.recommend',['error' => "Előbb vegyél fel egy filmet egy lejátszási listába!"]);
        }
        $playlists = Auth::user()->playlists->find($not_empty);
        $playlist = $playlists->random();
        
        $movie = $playlist->movies->random();

        $movies = $this->movies->getRecommendations($movie->id,['language' => 'hu-HU', 'region' => 'HU']);
           
        
        

       return view('movie.recommend',['movies' => $movies]);

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

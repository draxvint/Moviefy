<?php

namespace Moviefy\Http\Controllers;

use Moviefy\Movie;
use Moviefy\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Tmdb\Repository\MovieRepository;


class PlaylistController extends Controller
{

    function __construct(MovieRepository $movies)
    {
        $this->movies_api = $movies;
    }
    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $playlists =  Playlist::all();
        return view('playlist.index',['playlists' => $playlists]);
    }

    public function show($id){
        $return = collect();
        $playlist = Playlist::find($id);
        foreach ($playlist->movies as $movie){
            $i =  $this->movies_api->load($movie->id,['language' => 'hu-HU']);
            $return->push($i);
        }


        return view('playlist.show',['playlist' => $playlist, 'return' => $return]);
    }

    public function addMovie(Request $request)
    {
        if(!$request->filled('playlist')){
            return Redirect::back()->with('error', "Nincs kiválasztva lejátszási lista");
        }
        $playlist = Playlist::find($request['playlist']);
        if (!Movie::find($request['movie'])){
            $movie = new Movie();
            $movie->id = $request['movie'];
            $movie->save();
        }
        $movie = Movie::find($request['movie']);
        $playlist->movies()->save($movie);
        return Redirect::back()->with('message', "Sikeresen hozzáadva a lejátszási listához");
    }

    public function  removeMovie(Request $request){
        $playlist = Playlist::find($request['playlist']);
        $movie = Movie::find($request['movie']);
        $playlist->movies()->detach($movie);
        return Redirect::back()->with('message', "Sikeresen eltávolítva a lejátszási listából");
    }

    public function store(Request $request){
        $user = Auth::user();
        $playlist = new Playlist();
        $playlist->name = $request['name'];
        $user->playlists()->save($playlist);
        return Redirect::back()->with('message', "Lejátszási lista sikeresen létrehozva");
    }

    public function create() {
        return view('playlist.create') ;
    }

    public function delete(Request $request){
        $playlist = Playlist::find($request['playlist']);
        $playlist->movies()->detach();
        $playlist->delete();
        return Redirect::route('profile.playlists')->with('message', 'Lejátszási lista sikeresen törölve');
    }
}

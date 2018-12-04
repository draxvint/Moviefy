<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PlaylistController extends Controller
{

    
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $playlists =  Playlist::all();
        return view('playlist.index',['playlists' => $playlists]);
    }

    public function show($id){

        $playlist = Playlist::find($id);
        return view('playlist.show',['playlist' => $playlist]);
    }

    public function addMovie(Request $request)
    {
        $playlist = Playlist::find($request['playlist']);
        //$movie new Movie(); //TODO Film elmentése lejátszási listába
        //$playlist->movies()->save($movie);     
    }

    public function store(Request $request){

        $user = Auth::user();

        $playlist = new Playlist();
        $playlist->name = $request['name'];
        $user->playlists()->save($playlist);
    }

    public function create() {
        return view('playlist.create') ;
    }
}

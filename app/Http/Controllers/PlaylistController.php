<?php

namespace App\Http\Controllers;

use App\Playlist;


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

    public function addMovie()
    {

    }
}

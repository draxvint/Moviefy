<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }


    public function settings()
    {
        return view('profile.settings');
    }


    public function playlists()
    {
        $playlists = Auth::user()->playlists;
        return view('profile.user-playlists',['playlists' => $playlists]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = Auth::user();
        $user->name = $request['name'];
        $user->email = $request['email'];
        
            $image = $request->file('avatar');
            $name = str_slug($user->id).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/avatars');
            $imagePath = $destinationPath. "/".  $name;
            $image->move($destinationPath, $name);
            $user->avatar = $name;
        
        

        

        
        $user->save();
        return Redirect::route('profile.settings');
    }

}

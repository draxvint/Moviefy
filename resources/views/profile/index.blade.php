@extends('profile.layouts.profile')

@section('profile-content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4 class="float-left">Profilod</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <img width="150px" height="150px" class="rounded-circle" src="/uploads/avatars/{{ Auth::user()->avatar }}" />
                        
                        <h4>Név: {{Auth::user()->name}}</h3>
                        <h5>Email: {{Auth::user()->email}}</h4>

                        <p>Lejátszási listák száma: {{Auth::user()->playlists->count()}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

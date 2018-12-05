@extends('profile.layouts.profile')

@section('profile-content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4 class="float-left">Lejátszási listák</h4><a class="btn btn-primary float-right" href="{{route('playlist.create')}}" role="button">Lejátszási lista létrehozása</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                            @foreach ($playlists as $playlist)

                            <a href="{{route('playlist.show',['id' => $playlist->id])}}">{{$playlist->name}}</a><br>

                            @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

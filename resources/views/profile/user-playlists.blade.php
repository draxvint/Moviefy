@extends('profile.layouts.profile')

@section('profile-content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Lejátszási listák</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @foreach($playlists as $playlist)
                            <a href="{{route('playlist.show',['id' => $playlist->id])}}">{{$playlist->name}}</a>
                            @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

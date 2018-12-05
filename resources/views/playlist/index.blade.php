@extends('layouts.app')

{{--@inject('image', 'Tmdb\Helper\ImageHelper')--}}




@section('content')

    <div class="container">

        <div class="d-flex align-content-center justify-content-around flex-wrap">
            @foreach ($playlists as $playlist)


                <div class="movie-item">
                    <div class="poster-wrapper">
                        <a href="/movie/{{ $playlist->id }}">
                            <div class="poster" style="background-image:"></div>
                        </a>
                    </div>

                    <h4>
                        <a href="/playlist/{{ $playlist->name }}">
                            {{ $playlist->name }}
                        </a>
                    </h4>
                    <p>{{$playlist->user->name}}</p>
                </div>


            @endforeach
        </div>

    </div>


@endsection

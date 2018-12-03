@extends('layouts.app')

{{--@inject('image', 'Tmdb\Helper\ImageHelper')--}}




@section('content')
<!-- Tönköly Andor készítette -->
    <div class="container">

        <div class="d-flex align-content-center justify-content-around flex-wrap">
            @foreach ($playlist->movies as $movie)


                <div class="movie-item">
                    <div class="poster-wrapper">
                        <a href="/movie/{{ $movie->id }}">
                            <div class="poster" style="background-image: url('')"></div>
                        </a>
                    </div>

                    <h4>
                        <a href="/movie/{{ $movie->id }}">
                            {{ $movie->title }}
                        </a>
                    </h4>
                    <p>
                    <p></p>
                </div>


            @endforeach
        </div>

    </div>
<!-- END Tönköly Andor -->
@endsection

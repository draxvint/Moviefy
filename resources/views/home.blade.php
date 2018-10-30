@extends('layouts.app')

@inject('image', 'Tmdb\Helper\ImageHelper')




@section('content')
    <div class="container">

        <div class="d-flex align-content-center justify-content-around flex-wrap">
            @foreach ($movies as $movie)


                <div class="movie-item">
                    <div class="poster-wrapper">
                        <a href="/movie/{{ $movie->getId() }}">
                            <div class="poster" style="background-image: url('{{ $image->getUrl($movie->getPosterImage(), 'w500') }}')"></div>
                        </a>
                    </div>

                    <h4>
                        <a href="/movie/{{ $movie->getId() }}">
                            {{ $movie->getTitle() }}
                        </a>
                    </h4>
                    <p>@foreach($movie->getGenres() as $genre)
                            {{$genre->getName()}}
                        @endforeach</p>
                    <p>{{ $movie->getVoteAverage() }} ({{ $movie->getVoteCount() }})</p>
                </div>

                {{--foreach($movie->getGenres() as $genre) {--}}
                {{--printf(" - %s\n", $genre->getName());--}}
                {{--}--}}


            @endforeach
        </div>

    </div>

@endsection

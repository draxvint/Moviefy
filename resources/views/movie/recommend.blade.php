@extends('layouts.app')

@inject('image', 'Tmdb\Helper\ImageHelper')




@section('content')

    @if(!empty($error))
        <div class="alert alert-warning">
            {{ $error }}
        </div>
     @endif
    <div class="container">
       

        <div class="d-flex align-content-center justify-content-around flex-wrap">
        @if(!empty($movies))
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
                <div class="align-text-bottom"><i class="fa fa-star movie-rating-fa"></i> {{ $movie->getVoteAverage() }} ({{ $movie->getVoteCount() }})</div>
            </div>

            {{--foreach($movie->getGenres() as $genre) {--}}
            {{--printf(" - %s\n", $genre->getName());--}}
            {{--}--}}


@endforeach
        @endif
            
        </div>

    </div>

@endsection

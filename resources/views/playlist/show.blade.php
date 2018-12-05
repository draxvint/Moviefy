@extends('layouts.app')

@inject('image', 'Tmdb\Helper\ImageHelper')




@section('content')

    <div class="container">


        <div class="d-flex align-content-center justify-content-around flex-wrap">
            @foreach($return as $movie)


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
                    <form method="post" action="{{route('playlist.remove-movie')}}">
                        @csrf
                        <input type="hidden" value="{{$movie->getId()}}" name="movie">
                        <input type="hidden" value="{{$playlist->id}}" name="playlist">
                        <button type="submit" class="btn btn-danger btn-sm float-right"><i class="fa fa-minus"></i></button>
                    </form>

                </div>


            @endforeach
        </div>

        <form method="post" action="{{route('playlist.delete')}}">
            @csrf
            <input type="hidden" value="{{$playlist->id}}" name="playlist">
            <button type="submit" class="btn btn-danger float-right">Lejátszási lista törlése</button>
        </form>

    </div>

@endsection

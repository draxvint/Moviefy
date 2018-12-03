@extends('layouts.app')
@inject('image', 'Tmdb\Helper\ImageHelper')
@section('content')
    <div class="container">
        <div id="backdrop" class="row" style="background: url({{ $image->geturl($movie->getBackdropImage(), 'w1280') }})  no-repeat center center fixed/cover;
            ">

            {{--<img  src="{{ $image->getUrl($movie->getBackdropImage()) }}" class="img-fluid" alt="{{$movie->getTitle()}}" height="250px">--}}

        </div>
        <div class="row">
            {{--Poster--}}
            <div class="col-sm-3" style="width: 261px; margin-top: -150px;">
                <div class="poster" style="background-image: url('{{ $image->getUrl($movie->getPosterImage(), 'w500') }}')"></div>
            </div>

            <div class="col-sm-9">
                {{--Cím--}}
                <div class="row mt-4">
                    <div class="col-sm">
                        <h2>{{$movie->getTitle()}}</h2>
                    </div>
                </div>
                {{--Hossz és genres--}}
                <div class="row">
                    <div class="col-sm">
                        {{$movie->getRuntime()}} perc
                        @foreach($movie->getGenres() as $genre )
                            <a href="#">{{$genre->getName()}}</a> {{ ($loop->last ? '' : ',') }} <!-- TODO Genre link -->
                        @endforeach

                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm">
                        {{$movie->getOverview()}}
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm">
                        <i class="fa fa-star"></i>
                    </div>
                </div>

            </div>


        </div>
        @if($user_playlists)
        <div class="row">
            <form method="post" action="{{route('playlist.addMovie')}}">
                @csrf

                <div class="input-group">
                    <select class="custom-select" id="inputGroupSelect04" >
                        <option selected>Choose...</option>
                        @foreach($user_playlists as $playlist )
                        <option values='{{$playlist->id}}'>{{$playlist->name}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="movie" value="{{$movie->getId()}}">

                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Hozzáadás</button>
                    </div>
                </div>

            </form>
        </div>
        @endif
    </div>
@endsection


{{--@foreach($movie->getGenres() as $genre)
    {{$genre->getName()}}
@endforeach--}}

@extends('layouts.app')
@inject('image', 'Tmdb\Helper\ImageHelper')
@section('content')
    <div class="container">
        <div id="backdrop" class="row" style="background: url({{ $image->geturl($movie->getBackdropImage(), 'w1280') }})  no-repeat center center fixed;background-size: cover; -moz-background-size: cover; -webkit-background-size: cover; -ms-background-size: cover; ">

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
                    <div class="col-sm">
                        @if($user_playlists)

                                <form method="post" action="{{route('playlist.addMovie')}}">
                                    @csrf

                                    <div class="input-group">
                                        <select name="playlist" class="custom-select" id="inputGroupSelect04" >
                                            <option disabled selected>Válassz...</option>
                                            @foreach($user_playlists as $playlist )
                                                <option @if($playlist->movies->find($movie->getId()))disabled @else  @endif value='{{$playlist->id}}'>{{$playlist->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit">Hozzáadás</button>
                                            <a href="{{route('playlist.create')}}" class="btn btn-outline-primary"> Új</a>
                                        </div>
                                    </div>
                                    <input type="hidden" name="movie" value="{{$movie->getId()}}">
                                </form>

                        @endif
                    </div>
                </div>
                {{--Hossz és genres--}}
                <div class="row">
                    <div class="col-sm">
                        {{$movie->getRuntime()}} perc

                        @foreach($movie->getGenres() as $genre )
                            <a href="{{route('genre.show',['genre' =>$genre->getId()])}}">{{$genre->getName()}}</a> {{ ($loop->last ? '' : ',') }}
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
                        <div class="align-text-bottom"><i class="fa fa-star movie-rating-fa"></i> {{ $movie->getVoteAverage() }} ({{ $movie->getVoteCount() }})</div>
                    </div>
                </div>

            </div>


        </div>
        <section>
            <div class="row">
                <div class="col-sm-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Stáb</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#">Vélemények</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#">Történet</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h4>Színészek</h4>
                            <div class="row">

                                @foreach($movie->getCredits()->getCast() as $cast)
                                <div class="col-3">

                                    <div>
                                        <div style="height: 100px; width: 100px; border-radius: 50%; background-image: url('{{$image->geturl($cast->getProfileImage(),'w185')}}');
                                                background-size: cover" class="float-left"></div>
                                    <p>{{$cast->getName()}}</p>
                                        <p>Mint {{$cast->getCharacter()}}</p>


                                    </div>
                                </div>
                                    @if ($loop->iteration == 4)
                                        @break
                                    @endif
                                @endforeach
                            </div>




                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection


{{--@foreach($movie->getGenres() as $genre)
    {{$genre->getName()}}
@endforeach--}}

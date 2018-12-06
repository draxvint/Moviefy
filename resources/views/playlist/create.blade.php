@extends('layouts.app')

{{--@inject('image', 'Tmdb\Helper\ImageHelper')--}}




@section('content')

<div class="container">

    <div class="d-flex align-content-center justify-content-around flex-wrap">



        <form method="post" action="{{route('playlist.store')}}">
            @csrf
            <div class="form-group">
            <label for="name">Lista neve</label>
            <input name="name"  class="form-control" id="name" aria-describedby="nameHelp" placeholder="Adja meg a lista nevét" required>
        </div>
        <button type="submit" class="btn btn-primary">Létrehozás</button>
    </form>

</div>

</div>

@endsection
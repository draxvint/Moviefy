@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex align-content-center justify-content-around flex-wrap">
            @for ($j = 0; $j < 16; $j++)


                <div class="movie-item">
                    <div class="poster-wrapper">
                        <div class="poster" style="background-image: url(http://www.joblo.com/assets/images/oldsite/posters/images/full/babydriver1200.jpg)"></div>
                    </div>
                    <h3>Baby Driver</h3>
                    <p>Akció / Kaland / Romantikus</p>
                    <p>* 8.3 (123,234)</p>
                </div>

            @endfor
        </div>

    </div>

@endsection

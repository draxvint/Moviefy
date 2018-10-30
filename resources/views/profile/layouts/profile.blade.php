@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('profile.includes.menu')

            @yield('profile-content')
        </div>
    </div>
@endsection

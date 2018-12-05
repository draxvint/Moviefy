@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Erősítsd meg az email címed') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Megerősítő link elkdüldve') }}
                        </div>
                    @endif

                    {{ __('Mielőtt tovább lépnél, ellenőrízd az emaileidet.') }}
                    {{ __('Ha nem kaptál e-mail-t') }}, <a href="{{ route('verification.resend') }}">{{ __('kattintsd ide egy másikért.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

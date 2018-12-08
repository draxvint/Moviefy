@extends('profile.layouts.profile')

@section('profile-content')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4 class="float-left">Profilod</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{route('profile')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Név</label>
                                <div class="col-8">
                                    <input value="{{Auth::user()->name}}" id="name" name="name" placeholder="Név" class="form-control here" type="text">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email*</label>
                                <div class="col-8">
                                    <input value="{{Auth::user()->email}}" id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                </div>
                            </div>


                            {{--<div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">Új jelszó</label>
                                <div class="col-8">
                                    <input id="newpass" name="newpass" placeholder="Új jelszó" class="form-control here" type="password" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">Új jelszó mégegyszer</label>
                                <div class="col-8">
                                    <input id="newpassagain" name="newpassagain" placeholder="Új jelszó mégegyszer" class="form-control here" type="password" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">Jelenlegi jelszó</label>
                                <div class="col-8">
                                    <input id="password" name="password" placeholder="Jelenlegi jelszó" class="form-control here" type="password" autocomplete="current-password">
                                </div>
                            </div>--}}
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Mentés</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

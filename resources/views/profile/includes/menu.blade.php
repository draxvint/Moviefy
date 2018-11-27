<div class="col-md-3 ">
    <div class="list-group ">
        <a href="{{ route('profile') }}" class="{{ Route::currentRouteName() === 'profile' ? 'active' : '' }} list-group-item list-group-item-action">Profil</a>
        <a href="{{ route('profile.playlists') }}" class="{{ Route::currentRouteName() === 'profile.playlists' ? 'active' : '' }} list-group-item list-group-item-action">Lejátszási listák</a>
        <a href="{{ route('profile.settings') }}" class="{{ Route::currentRouteName() === 'profile.settings' ? 'active' : '' }} list-group-item list-group-item-action">Beállítások</a>
        <a href="#" class="list-group-item list-group-item-action">Értesítések</a>

    </div>
</div>

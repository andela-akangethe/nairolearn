@extends('index')

@section('content')
     <div class="container" style="padding-top:2%;">
      <div class="row">
          <div class="col-md-2">
            <ul class="nav nav-sidebar">
                <li style="margin-left:20px;">
                  @if (Auth::user()->avatar == null)
                    <img class="avatar" src="/img/gravatar.jpg"/>
                    <h3><small>{{ auth()->user()->name }}</small></h3>
                  @else
                    <img class="avatar" src="{{ Auth::user()->avatar }}" class="img-circle img-responsive"/>
                    <h3><small>{{ auth()->user()->name }}</small></h3>
                  @endif
                </li>
                <li><a href="/videos/create" class="{{ Request::is( 'videos/create') ? 'list-group-item active' : '' }}">Add a new video</a></li>
                <li><a href="/videos" class="{{ Request::is( 'videos') ? 'list-group-item active' : '' }}">Your Videos</a></li>
                <li><a href="{{ route('userProfile', ['id' => auth()->user()->id]) }}" class="{{ Route::currentRouteName() == 'userProfile'  ? 'list-group-item active' : ''}}">Your Profile</a></li>
                <li><a href="{{ route('userProfileEdit') }}" class="{{ Route::currentRouteName() == 'userProfileEdit'  ? 'list-group-item active' : ''}}">Edit Your Profile</a></li>
            </ul>
          </div>
          <div class="col-md-10">
            @yield('details')
          </div>
      </div>
  </div>
@endsection
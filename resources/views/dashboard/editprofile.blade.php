@extends('dashboard.home')
@section('details')
<div class="container">
   <div class="container">
     <div class="row user-profile">
        <div class="col-lg-3 " align="center">
          @if (Auth::user()->avatar == null)
            <img class="profile" src="/img/profile.jpg"/>
          @else
            <img class="profile" src="{{ Auth::user()->avatar }}" class="img-circle img-responsive"/>
          @endif
        </div>
        <div class="col-lg-9 ">
          <form class="form-vertical" role="form" method="post" action="{{ route('userProfileEdit') }}">
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="form-group">
                  <label for="name" class="control-label">Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?: auth()->user()->name }}">
              </div>
              <div class="form-group">
                  <label for="email" class="control-label">Email</label>
                  <input type="text" name="email" class="form-control" id="email" value="{{ old('email') ?: auth()->user()->email }}">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-default">Update</button>
              </div>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </form>
        </div>
     </div>
   </div>
</div>
@endsection
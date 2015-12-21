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
        <div class="col-lg-9 col-md-6 ">
          <div class="row">
              <div class="col-lg-8">
                  <form class="form-horizontal" role="form" method="post" action="{{ route('userProfileEdit') }}">
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
                          <label for="name" class="control-label col-sm-2">Name:</label>
                          <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') ?: auth()->user()->name }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="email" class="control-label col-sm-2">Email:</label>
                          <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') ?: auth()->user()->email }}">
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2" >
                          <button type="submit" class="btn btn-default">Update</button>
                        </div>
                      </div>
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </form>
              </div>
          </div>
        </div>
     </div>
   </div>
</div>
@endsection
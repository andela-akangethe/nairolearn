@extends('dashboard.home')
@section('details')
<div class="container">
  <div class="row">
      <div class="col-md-3 col-lg-4 ">
        @if (Auth::user()->avatar == null)
          <img src="/img/profile.jpg" class="img-circle img-responsive">
        @else
          <img class="userProfile" src="{{ Auth::user()->avatar }}" class="img-circle img-responsive"/>
        @endif
      </div>
      <div class=" col-md-9 col-lg-8 ">
        <h3>Name:</h3>
        <p>{{ auth()->user()->name }}</p>
        <h3>Email:</h3>
        <p>{{ auth()->user()->email }}</p>
      </div>
  </div>
</div>
@endsection
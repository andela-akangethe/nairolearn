@extends('dashboard.home')
@section('details')
<div class="container">
    <div class="row">
        <div class="panel">
          <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                  @if (Auth::user()->avatar == null)
                    <img src="/img/profile.jpg" class="img-circle img-responsive">
                  @else
                    <img class="userProfile" src="{{ Auth::user()->avatar }}" class="img-circle img-responsive"/>
                  @endif
                </div>
                <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td>{{ auth()->user()->name }}</td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td>{{ auth()->user()->email }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
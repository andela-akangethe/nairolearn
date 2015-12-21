@extends('index')

@section('content')
<div class="container">
  <div class="row content">
    <div class="col-md-8" style="padding-top:1%;">
      <div class="row content">
          <div class="col-lg-12">
              <h3>Titile- {{ $video->title }}</h3>
              <a href="video/{{ $video->id }}" >
                  <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src={{ $video->url }} frameborder="0" allowfullscreen></iframe>
                  </div>
              </a>
          </div>
       </div>
    </div>
    <div class="col-md-4" style="padding_top:1%;">
        <h3><small>Description: </small></h3>
        <p><strong>{{ $video->description }}</strong></p>

        <h3><small>Category: </small></h3>
        <p><strong>{{ $video->category }}</strong></p>

        <div class="space" style="padding:3% 0 6% 0;">
            <a class="btn btn-default" href="{{ URL::previous() }}">Go Back</a>
        </div>
    </div>
  </div>
</div>
@endsection
@extends('index')

@section('content')
<!-- Header -->
<header id="head">
    <div class="container text-center">
        <div class="home-image">
            <h1 class="lead"><strong>KNOWLEDGE KINGDOM</strong></h1>
            <p class="tagline"><em>Welcome to a whole new world.</em></a></p>
            @if (! Auth::guest())
                <p><a class="btn btn-success btn-action btn-lg" href="/videos/create" role="button">ADD NEW VIDEO</a></p>
            @endif
        </div>
    </div>
</header>
<!-- /Header -->
<div class="container text-center site">
  <div class="row content">
    <div class="col-md-10">
      <div class="row content videos">
          @foreach($videos as $video)
              <div class="col-lg-6">
                  <p><strong>{{ $video->title }}</strong></p>
                  <a href="video/{{ $video->id }}" >
                      <div class="embed-responsive embed-responsive-16by9">
                          <iframe class="embed-responsive-item" src={{ $video->url }} frameborder="0" allowfullscreen></iframe>
                      </div>
                  </a>
                  <div class="space" style="padding:3% 0 6% 0;">
                      <a class="btn btn-primary" href="/videos/{{ $video->id }}">GET MORE INFO</a>
                  </div>
              </div>
          @endforeach
       </div>
    </div>
    <div class="col-md-2 categories">
      <h3 class="category list-group-item active">Categories</h3>
        <div class="top" style="margin-top: 10%;">
          @foreach($videos as $video)
                <p><a href="/category/{{ $video->category }}">{{ $video->category }}</a></p>
          @endforeach
        </div>
    </div>
  </div>
</div>
@endsection
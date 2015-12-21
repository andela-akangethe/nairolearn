@extends('index')

@section('content')
<div class="container site">
  <div class="row content">
    <div class="col-md-12">
      <div class="row content videos">
          @foreach($videos as $video)
              <div class="col-lg-6 col-md-6 col-xs-12">
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
       {!! $videos->render() !!}
    </div>
  </div>
</div>
@endsection
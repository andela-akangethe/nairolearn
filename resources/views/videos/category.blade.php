@extends('index')

@section('content')
  <div class="container text-right" style="padding-top:1%;">
      <a class="btn btn-default" href="/" style="text_aligin:right ">Go Back To Home</a>
  </div>
  <div class="container">
    <div class="row content">
      <div class="col-md-12">
        <div class="row content">
            @foreach($videosCategory as $videosCategory)
                <div class="col-lg-6">
                    <p><strong>{{ $videosCategory->title }}</strong></p>
                    <a href="videosCategory/{{ $videosCategory->id }}" >
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src={{ $videosCategory->url }} frameborder="0" allowfullscreen></iframe>
                        </div>
                    </a>
                    <div class="space" style="padding:3% 0 6% 0;">
                          <a class="btn btn-primary" href="/videos/{{ $videosCategory->id }}">GET MORE INFO</a>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
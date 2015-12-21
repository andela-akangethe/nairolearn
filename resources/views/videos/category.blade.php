@extends('index')

@section('content')
  <div class="container text-right" style="padding-top:1%;">
      <a class="btn btn-default" href="/" style="text_aligin:right ">Go Back To Home</a>
  </div>
  <div class="container">
    <div class="row content">
      <div class="col-md-12">
        <div class="row content videos">
            @foreach($category as $category)
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <p><strong>{{ $category->title }}</strong></p>
                    <a href="video/{{ $category->id }}" >
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src={{ $category->url }} frameborder="0" allowfullscreen></iframe>
                        </div>
                    </a>
                    <div class="space" style="padding:3% 0 6% 0;">
                        <a class="btn btn-primary" href="/videos/{{ $category->id }}">GET MORE INFO</a>
                    </div>
                </div>
            @endforeach
         </div>
      </div>
    </div>
  </div>
@endsection
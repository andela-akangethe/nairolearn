@extends('dashboard.home')

@section('details')

  @if(count($videos) == 0)
      <h3 style="text-align:center;"><small>You currently haven't added any new videos. Please add one.</small></h3>
  @else
    @foreach($videos as $video)
        <div class="col-lg-6">
            <p><strong>{{ $video->title }}</strong></p>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src={{ $video->url }} frameborder="0" allowfullscreen></iframe>
            </div>
            <span><p style="font-weight: bold;">{{ $video->description }}</p></span>
            {!! Form::open(['method' => 'DELETE', 'route'=>['videos.destroy', $video->id]]) !!}
            <button type="submit" class="btn btn-danger btn-md"><span class="glyphicon glyphicon-trash"></span> Delete</button>
            {!! Form::close() !!}
            <a href="{{ route('videos.destroy')}}"></a>
        </div>
    @endforeach
  @endif

@endsection
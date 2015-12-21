<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nairolearn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Nairolearn</a>
      <form class="navbar-form navbar-left" role="search" action="{{ route('search') }}">
        <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Find category">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
          <li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/user/{{ auth()->user()->name }}"><span class="glyphicon glyphicon-user"></span> Your Profile</a></li>
                    <li><a href="/videos/create"><span class="glyphicon glyphicon-facetime-video"></span> Add Video</a></li>
                    <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                </ul>
            </li>
            @if (Auth::user()->avatar == null)
              <img class="avatar" src="/img/gravatar.jpg"/>
            @else
              <img class="avatar" src="{{ Auth::user()->avatar }}"/>
            @endif
        @endif
      </ul>
    </div>
  </div>
</nav>
  <div class="background">
    @yield('content')
  </div>
</body>
</html>

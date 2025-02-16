<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shop</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
  <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('images/logo/logo.png')}}" alt="Company logo" class="logo-img"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('about')}}">About</a>
      </li>
      @unless($pages->isEmpty())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pages
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach($pages as $page)
          <a class="dropdown-item" href="{{url($page->slug)}}">{{ucfirst($page->name)}}</a>
@endforeach
        </div>
      </li>
      @endunless
          <li class="nav-item">
        <a class="nav-link" href="{{url('shop')}}">Shop</a>
      </li>
    </ul>
      <ul class="navbar-nav ml-auto">
          @if(session('id'))
          @if(session('role')=== 17)
           <li class="nav-item ">
        <a class="nav-link font-weight-bold" href="{{url('admin')}}">Deshboard</a>
      </li> 
          @endif
          <li class="nav-item ">
        <a class="nav-link" href="{{url('logout')}}">{{ucfirst(session('name'))}}, Logout</a>
      </li>
          @else
          <li class="nav-item ">
        <a class="nav-link" href="{{url('login')}}">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('signup')}}">Sign up</a>
      </li>
      @endif
      </ul>
      <div id="mini-cart">
          <a class="text-secondary" href="{{url('cart')}}">
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg>
            <span>{{$cart_count?:''}}</span>
      </a>
      </div>
  </div>
  </div>
</nav>
        </header>
        <main>
                <div class="container">
                    <div id="alert"></div>
                    
                    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
                  @if (session('status-fail'))
    <div class="alert alert-danger">
        {!! session('status-fail') !!}
    </div>
@endif
       @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif             
            @yield('content')
        </div>
            
        </main>
        <footer class="bg-light">
            <div class ="container text-center p-5">
            &copy; Developed by Elazar Goldman {{date ('Y')}}    
            </div>
        </footer>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>

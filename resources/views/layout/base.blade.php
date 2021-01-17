<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homeStyle.css">
    <link rel="stylesheet" href="css/registerStyle.css">
    <link rel="stylesheet" href="css/loginStyle.css">
    <link rel="stylesheet" href="css/programmeStyle.css">
    <link rel="stylesheet" href="css/profileStyle.css">
    <link rel="stylesheet" href="css/classContainer.css">
    <link rel="stylesheet" href="css/baseStyle.css">
    <link rel="stylesheet" href="css/dropdown.css">
    <title>Hello, world!</title>
  </head>
  <body style="background-color:black;">
    <nav class="navbar">
        <ul>
            <li id="logo"><img src="picture/logo.png" height="40px" widht="40px"></li>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>
                <div class="dropdown">
                     <a href="{{url('/programme')}}">Programme</a>
                        <div class="dropdown-content">
                            <a href="#">Programmer</a>
                            <a href="#">2D Art</a>
                            <a href="#">3D Art</a>
                            <a href="#">Game Design</a>
                        </div>
                    </div>
            </li>
                        @guest
                                <li id="tombollogin"><a href="{{ route('login') }}">Log In</a></li>
                            @if (Route::has('register'))
                                <li id="tombolregister">
                                    <a href="{{ route('register') }}">Sign Up</a>
                                </li>
                            @endif
                        @else
                                    <li><a href="{{url('/profileprofile')}}">Profile</a></li>
                                    <li id="tombolregister"><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                        @endguest
                    
                    <img id="tombolsearch" src="picture/search.png">
                    <input type="text" placeholder="     Search for anything" id="kolomsearch">
        </ul>
    </nav>
    <div class="divkosong"></div>
  @yield('container')
  </body>
</html>

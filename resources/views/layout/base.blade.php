<!doctype html>
<html lang="en">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/homeStyle.css">
    <link rel="stylesheet" href="/css/registerStyle.css">
    <link rel="stylesheet" href="/css/loginStyle.css">
    <link rel="stylesheet" href="/css/programmeStyle.css">
    <link rel="stylesheet" href="/css/profileStyle.css">
    <link rel="stylesheet" href="/css/classContainer.css">
    <link rel="stylesheet" href="/css/baseStyle.css">
    <link rel="stylesheet" href="/css/dropdown.css">
    <link rel="stylesheet" href="/css/isiprogrammeStyle.css">
    <link rel="stylesheet" href="/css/learnStyle.css">
    <link rel="stylesheet" href="/css/menuvideo.css">
    <link rel="stylesheet" href="/css/checkout.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/animasi.css">
    <link rel="stylesheet" href="/css/mycart.css">
    <link rel="stylesheet" href="/css/modal.css">
    <link rel="stylesheet" href="/css/dashboard.css">

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <!-- script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

    <title>Kitab Game Academy Website</title>
  <header style="height:88px;">

    <div class="navigationbar">
        <div class="navbar-kiri">
        @guest
            <ul>
                <li><div class="logonav"><a href="{{url('/')}}"><img src="/picture/logo.png" height="40px" widht="40px"></a></div></li>
                <li class="listmenunav"><a href="{{url('/')}}">Home</a></li>
                <li class="listmenunav">      
                    <div class="dropdown">
                         <a href="{{url('/programme')}}">Programme</a>
                            <div class="dropdown-content">
                                <a href="{{url('/gametechnology')}}">Game Technology</a>
                                <a href="#">2D Art (Coming Soon)</a>
                                <a href="#">3D Art (Coming Soon)</a>
                                <a href="#">Game Production (Coming Soon)</a>
                            </div>
                    </div>
                </li>
            @else
            
            <li><div class="logonav"><a href="{{url('/')}}"><img src="/picture/logo.png" height="40px" widht="40px"></a></div></li>
                <li class="listmenunav"><a href="{{url('/')}}">Home</a></li>
                <li class="listmenunav">      
                    <div class="dropdown">
                         <a href="{{url('/programme')}}">Programme</a>
                            <div class="dropdown-content">
                                <a href="{{url('/gametechnology')}}">Game Technology</a>
                                <a href="#">2D Art (Coming Soon)</a>
                                <a href="#">3D Art (Coming Soon)</a>
                                <a href="#">Game Design (Coming Soon)</a>
                            </div>
                    </div>
                </li>
                <li class="listmenunav"><a href="{{url('/learning/home')}}">My Programme</a></li>
            @endguest

            </ul>
         
        </div>

        <div class="navbar-kanan">
                @guest
                <div class="tombollogin"><a href="{{ route('login') }}">Log In</a></div>
                @if (Route::has('register'))
                <div class="tombolregister"><a href="{{ route('register') }}">Sign Up</a></div>
                @endif

                @else
                    <div class="navbar-notifcart">
                        <div class="navbar-notifcart-satuan">
                         <a href="{{ url('/user/cart/mycart') }}"><img src="/picture/cart.png" alt="Alternate Text" /></a>
                         @if($countcart=DB::table('carts')->where('user_id',Auth::user()->id)->count() !=0)  
                         <p>{{$countcart}}</p>
                            @endif
                        </div>
                        <div class="navbar-notifcart-satuan">
                         <a href="{{ url('/notification') }}"><img src="/picture/notif.png" alt="Alternate Text" /></a>
                            @if($countnotif=DB::table('notifications')->where('user_id',Auth::user()->id)->count() !=0)  
                         <p>{{$countnotif}}</p>
                            @endif
                        </div>

                    </div>
                    <div class="dropdown" id="dropdownnama">
                        <div class="navbar-profile">
                            <img src="/picture/profilepic.png" height="60px" widht="60px"></img>
                            <ul class="list-menyamping">
                                <li><p>{{Auth::user()->name}} (<span style="color:#00FFF5;">Lv.{{Auth::user()->level}}</span>)</p></li>
                                <li><p>MR Poin : <span style="color:#00FFF5;">{{Auth::user()->militaryration}}</span></p></li> 
                            </ul>


                        </div>
                            <div id="dropdown-content-nama">
                                <div class="bagiandropdownprofile1">
                                    <img src="/picture/profilepic.png" height="60px" widht="60px">
                                    <p>
                                    <span class="bold">{{ Auth::user()->name }}</span>
                                    {{ Auth::user()->email }}
                                    </p>
                                </div>
                                <a class="hover" href="{{url('/user/cart/mycart')}}">My Cart</a>
                                <a class="hover" href="{{url('/notification')}}">Notification</a>
                                <a class="hover" href="{{url('/myprofile')}}">My profile</a>
                                <a class="hover" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                            </div>
                    </div>
                @endguest                   
            </ul>
        </div>
    </div>
  </header>
  <body style="    color: #fff;
    background-color: #1F1F1F;
    background-size: cover;
    display: flex;">
      @if (session('alert'))
    <div class="notif-alert">
        {{ session('alert') }}
    </div>
@endif
    <div class="pagecontain">
    @yield('container')
      <footer>
    <div class="footer">
        <ul>
            <li><p style="color:white;">@H2L_studio, Inc.2020</p></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Terms</a></li>
        </ul>
    </div>
  </footer>
    </div>
  </body>
    <script>
    $(document).ready(function(){
            setTimeout(function(){
               $(".notif-alert").fadeOut();
            }, 3000 ); // 3 secs
        });

    </script>
<style>
    a:link {
    text-decoration: none;

}

a:visited {
    text-decoration: none;

}

a:hover {
    text-decoration: none;

}

a:active {
    text-decoration: none;

}
}</style>
</html>

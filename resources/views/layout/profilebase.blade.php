@extends('layout/base')
@section('container')
    <div class="profilecontainer">
        <div class="profilecontainer-left">
            <img src="/picture/profilepic.png" height="180px" widht="180px"></img>
            <h1>{{Auth::user()->name}}</h1>
            <li><a href="{{url('/myprofile')}}">My Profile</a></li>
            <li><a href="{{url('/myprogramme')}}">My Programme</a></li>
        </div>

        <div class="profilecontainer-right">
            <div class="profilecontainer-right-header">
               <h1>@yield('headerprofile')</h1>
               <img src="/picture/pangkat.png" height="80px" widht=""></img>
               <h2 style="font-size:20px;">Level {{Auth::user()->level}}</h2>
               <div class="kotak-expbar">
                   <div class="kontainer-expbar">
                        <h4>{{Auth::user()->currentexp}} / 1000 EXP</h4>
                        <div class="expbar">

                        </div>
                   </div>
                </div>
            </div>
            <div class="profilecontainer-right-body">
                <div class="profilecontainer-right-body-contain">
                        @yield('containerbodyprofile')
               </div>
            </div>
        </div>
    </div>
    <script>
        var $percent = <?php echo Auth::user()->currentexp /10; ?>;
    $(document).ready(function(){

            $(".expbar").animate({ width: $percent + "%" },2000);

    });
    </script>
@endsection



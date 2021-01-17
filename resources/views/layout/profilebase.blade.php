@extends('layout/base')
@section('container')
    <div class="row" id="profile">
            <div class="col-md-3" id="profilebagiankiri">
                <img src="picture/dp.png" /><br /><br />
                <label style="font-weight:bold;">Hary Subroto</label><br /><br />
                <label class="bagianfollow1" id="follower">41</label>
                <label class="bagianfollow1" id="following">50</label><br />
                <label class="bagianfollow2">Follower</label>
                <label class="bagianfollow2">Following</label><br /><br />
                <div class="menupilihanprofile">
                <a class="menupilihanprofile" href="{{url('/profileprofile')}}">Profile</a><br />
                <a class="menupilihanprofile" href="{{url('/classprofile')}}">Class</a><br />
                <a class="menupilihanprofile" href="{{url('/postprofile')}}">Post</a><br />
                <a class="menupilihanprofile" href="{{url('/friendprofile')}}">Friend</a>
                </div>
            </div>
            <div class="col-md-7" id="profilebagiankanan">
             @yield('containerprofile')
            </div>
    </div><!--bagian profile-->
@endsection

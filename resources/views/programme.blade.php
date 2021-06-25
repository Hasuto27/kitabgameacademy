@extends('layout/base')
@section('container')
    <div class="listprogramme">
        <a href="{{url('/gametechnology')}}"><img src="picture/bannerprogramming.png" width="" height=""></a>
    </div>

    <div class="listprogramme">
        <a href="{{url('/gameproduction')}}">
            <img src="picture/bannergameproduction.png" width="" height="" />
        </a>
    </div>

@endsection

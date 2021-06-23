@extends('layout/base')
@section('container')
<div class="containerwebsite">

<img src="picture/bannerprogramming.png" width="" height="" id="bannerprogramme"></img>

<div class="difficulty">
<h1>Choose Your Difficulty</h1>
    <ul>
        <li><img src="picture/logobeginner.png" width="" height="" id="gambarbegginer"></li>
        <li><img src="picture/logointermediate.png" width="" height="" id="blur"></li>
        <li><img src="picture/logoexpert.png" width="" height="" id="blur"></li>
    </ul>
</div>
    <div class="isicontentprogramme">
        <img src="picture/contentgametech.png" width="100%" height="" id="isicontentprogramme"></img>
        @if (Auth::check()) 
<div class="fixedjoinnow">
    <p>Klik Di Sini Untuk Membuka Pembelajaran</p>
    <form action="/addtocart" method="post">
    @csrf
        <button name="idprogramme" value="1" type="submit">Add To Cart</button>
    </form>
</div>

@else
<div class="fixedjoinnow">
    <p>Daftar Sekarang Untuk Dapat Mengikuti Pembelajaran</p>
    <a class="tombol" style="font-size:1.2vw;" href="{{url('/register')}}">Daftar</a>
</div>

@endif
    </div>
</div>
@endsection

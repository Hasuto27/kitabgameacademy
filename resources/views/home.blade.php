@extends('layout/base')
@section('container')

    <div class="homebagian1">
        <img src="picture/gambarhome.png">
    </div>

    <div class="homebagian2">
        <img src="picture/segitiga1.png" height="80px" widht="80px" id="segitiga1">
        <h1 style="color:#FF367E;font-size:3vw;" id="judulwelcome">WELCOME TO KITAB GAME ACADEMY</h1>
        <p style="color:white;font-size:1.5vw;">Kitab Game Academy memberikan kesempatan untuk kalian agar dapat bisa mencari nafkah dengan membuat gim. Dengan harga yang terjangkau, kami akan mengarahkan kalian agar setelah  selesai dari kursus kami, kalian dapat terjun ke industri gim, baik dengan bekerja di studio gim yang  menembus pasar global ataupun membuat studio gim milikmu </p>
        <img src="picture/segitiga2.png" height="80px" widht="80px" id="segitiga2">
    </div>

    <div class="homebagian3">
        <img src="picture/maskot.png">
        <div class="tulisanjoinnow">
            <p>Temukan Kesenangan Mu Di Dalam</p>
            <p>Game Developing</p>
            <a href="{{url('/register')}}">Daftar Sekarang</a>
        </div>
    </div>


        <div class="homebagian4">
            <h1>Our Programme</h1>
            <a href="{{url('/gametechnology')}}"><img src="picture/logogametechnology.png"></a>
        </div>


        <div class="kolomdiscord">
            <img src="picture/logodiscord.png" id="logodiscord" height="" widht="">
            <div>
                <p>Gabung Dengan Komunitas Kami</p>
                <p>Di Discord</p><br>
                <a href="https://discord.gg/mRySECezZj" target="_blank" id="tomboljoindiscord">Join Now</a>
            </div>
        </div>


@endsection

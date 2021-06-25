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
    <link rel="stylesheet" href="/css/tutorial.css">

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
                                <a href="{{url('/gameproduction')}}">Game Production</a>
                                <a href="#">2D Art (Coming Soon)</a>
                                <a href="#">3D Art (Coming Soon)</a>
                            </div>
                    </div>
                </li>
                <li class="listmenunav"><a id="tombolOpenTutorial" data-toggle="modal" data-target="#modalTutorial">Tutorial</a></liclass="listmenunav">
            @else
            
            <li><div class="logonav"><a href="{{url('/')}}"><img src="/picture/logo.png" height="40px" widht="40px"></a></div></li>
                <li class="listmenunav"><a href="{{url('/')}}">Home</a></li>
                <li class="listmenunav">      
                    <div class="dropdown">
                         <a href="{{url('/programme')}}">Programme</a>
                            <div class="dropdown-content">
                                <a href="{{url('/gametechnology')}}">Game Technology</a>
                                <a href="{{url('/gameproduction')}}">Game Production</a>
                                <a href="#">2D Art (Coming Soon)</a>
                                <a href="#">3D Art (Coming Soon)</a>
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

      
             <div id="modalTutorial" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                          <div class="modal-header">
                              <h3 class="modal-title" style="color:#00FFF5;">- Tutorial -</h3>
                               <button type="button" class="close" data-dismiss="modal" id="tombolCloseX">&times;</button>
                          </div>
                          <div class="modal-body" style="color:black; min-height:200px; display:flex;">
                              <img class="robottutor"src="/picture/robottutor.png" alt="Alternate Text" />

                              <ul class="scene-tutorial">
                                  <li class="dialog-tutorial dialog-aktif">
                                     <div class="dialog-ballon">
                                      <h3>Welcome To Kitab Game Academy</h3>
                                      <p>Selamat datang di website pembelajaran online tentang Game Development !</p>
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon"><br /><br />
                                      <p>Namaku adalah PROTO-001.</p>
                                      <p>Saya akan memberikan bimbingan cara untuk memakai platform kami!</p>
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Register</h3>
                                      <p>Pertama, lakukan registrasi terlebih dahulu dengan menekan tombol "Register" dialog pojok kanan atas.</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor1.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Register</h3>
                                      <p>Kemudian, isi nama lengkap, email dan password anda dan tekan tombol "Register" untuk registrasi.</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor2.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                 <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Programme</h3>
                                      <p>Anda berhasil registrasi ! sekarang, mari kita tambahkan programme pada akun kita.</p>
                                      <p>Hmm? apa itu programme kamu tanya? itu adalah sebutan untuk topik pembelajaran disini.</p>
                                      <p>Sekarang, kita pilih programme yang kita inginkan dengan menekan tombol "Programme".</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor3.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Programme</h3>
                                      <p>Pilih programme yang kita inginkan dengan menekan "gambar" programme.</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor4.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Programme</h3>
                                      <p>Di tampilan programme ini,kita bisa melihat info detil tentang programme tersebut seperti apa saja yang akan kita pelajari. Sekarang kita tambahkan programme tersebut keygen dalam keranjang kita dengan menekan tombol "Add To Cart"</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor5.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Programme</h3>
                                      <p>Setelah menekan tombol "Add To Cart", secara otomatis halaman cart akan ditampilkan, atau anda bisa menampilkannya dengan menekan logo trolly dialog pojok kanan atas navbar. Pencet tombol "Checkout" untuk menyelesaikan transaksi.</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor6.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Learning</h3>
                                      <p>Keren ! kita sudah menambahkan programme di akun kita !</p>
                                      <p>Sekarang, mari kita coba untuk belajar ! untuk ke halaman learning, bisa dengan menekan tombol "My Programme".</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor7.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Learning</h3>
                                      <p>Pilih programme yang ingin kita pelajari.</p>
                                      <p>Tekan tombol "Learning" untuk memulai belajar.</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor8.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Learning</h3>
                                      <p>Kita sudah berada dihalaman learning !</p>
                                      <p>Di sini kita bisa menonton video pembelajaran, mengunduh materi dan mengerjakan quiz !</p>
                                      <p>Oops, sepertinya untuk dapat mengakses Part ke 2, kita harus menyelesaikan Quiz Part ke 1 terlebih dahulu</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor9.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Quiz</h3>
                                      <p>Mari kita selesaikan quiznya !</p>
                                      <p>Untuk memulai quiz, tekan table Quiz dan tekan tombol "Do Quiz".</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor10.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Quiz</h3>
                                      <p>Setelah kita memilih jawaban yang kita anggap benar, tekan tombol "Finallize" untuk mengumpulkan Quiz.</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor11.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Quiz</h3>
                                      <p>Asik ! kita mendapatkan EXP dan Poin setelah menyelesaikan Quiz ! EXP akan berguna untuk menaikan Level kita, dan Poin akan berguna untuk ditukarkan hal-hal yang menarik nantinya!</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor12.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Unlocked Part 2</h3>
                                      <p>Asik ! Sekarang kita bisa mengakses part ke 2 nya!</p>
                                      <img class="fototutor"width="500px" height="300px" src="/picture/tutorial/tutor13.png" alt="Alternate Text" />
                                     </div>
                                  </li>

                                  <li class="dialog-tutorial">
                                     <div class="dialog-ballon">
                                      <h3>Ended Tutorial</h3>
                                      <p>Bagaimana? Seru kan belajar dengan website kami? jika ada masukan atau hal lainnya yang ingin disampaikan, jangan ragu sampaikan kepada kami time H2L!</p>
                                      <p>PROTO-001, Pamit dulu gan ! Sampai Jumpa Lagi !</p>
                                     </div>
                                  </li>
                              </ul>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="tombol" id="tombolPrev">Prev</button>
                            <button type="button" class="tombol" id="tombolNext">Next</button>
                            <button type="button" class="tombol" id="tombolClose" data-dismiss="modal">Close</button>
                          </div>
                    </div>
               </div>
           </div>
          <script>
    $(document).ready(function(){
            setTimeout(function(){
               $(".notif-alert").fadeOut();
            }, 3000); // 3 secs

        $('#tombolCloseX').click(function () {
            $('.dialog-aktif').removeClass('dialog-aktif');
            $('.dialog-tutorial').eq(0).addClass('dialog-aktif');
            $('#tombolPrev').css('display', 'none');
            $('#tombolClose').css('display', 'none');
            $('#tombolNext').css('display', 'block');
        })
        $('#tombolClose').click(function () {
            $('.dialog-aktif').removeClass('dialog-aktif');
            $('.dialog-tutorial').eq(0).addClass('dialog-aktif');
            $('#tombolPrev').css('display', 'none');
            $('#tombolClose').css('display', 'none');
            $('#tombolNext').css('display', 'block');

        })
            $('#tombolNext').click(function () {
                var $next = $('.dialog-aktif').next();
                $('.dialog-aktif').removeClass('dialog-aktif');
                $($next).addClass('dialog-aktif');
                if ($('.dialog-tutorial').eq(0).hasClass('dialog-aktif')) { $('#tombolPrev').css('display', 'none'); } else { $('#tombolPrev').css('display', 'block'); }
                if ($('.dialog-tutorial').eq(15).hasClass('dialog-aktif')) { $('#tombolNext').css('display', 'none');$('#tombolClose').css('display', 'block'); } else { $('#tombolNext').css('display', 'block');$('#tombolClose').css('display', 'none');}
            })
            $('#tombolPrev').click(function () {
                var $prev = $('.dialog-aktif').prev();
                $('.dialog-aktif').removeClass('dialog-aktif');
                $($prev).addClass('dialog-aktif');
                if ($('.dialog-tutorial').eq(0).hasClass('dialog-aktif')) { $('#tombolPrev').css('display', 'none'); } else { $('#tombolPrev').css('display', 'block');}
                if ($('.dialog-tutorial').eq(15).hasClass('dialog-aktif')) { $('#tombolNext').css('display', 'none');$('#tombolClose').css('display', 'block'); } else { $('#tombolNext').css('display', 'block');$('#tombolClose').css('display', 'none');}
            })

        });
    </script>
  </body>

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

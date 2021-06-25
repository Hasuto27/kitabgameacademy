@extends('layout/base')
@section('container')
    <h1 class="judulbesar">Game Technology - Beginner</h1>
<div class="containerlearn">
    <div class="learnbagiankiri">
        <div class="video">
            <iframe src="{{$material->link_video}}" width="100%" height="480px"></iframe>
            <h2>{{$material->judul_material}}</h2>
        </div>

        
        <div class="kolommenuvideo">
            <label class="containermenuvideo">
                <input type="radio" checked="checked" name="radio" id="tombolabout">
                <p class="judulmenu">About</p>
                <div class="isi">
                    <div class="deskripsimenuvideo">
                        <p>{{$material->deskripsi}}</p>
                    </div>
                </div>
            </label>

            <label class="containermenuvideo">
                <input type="radio" name="radio" id="tombolresource">
                    <p class="judulmenu">Resource</p>
                    <div class="isi">
                        <div class="deskripsimenuvideo">
                        <p>Link Download Unity Hub
                        <a href="https://unity3d.com/get-unity/download" target="_blank"><img src="/picture/logodownload.png" height="" widht=""></a>
                        </p>
                        <br>
                        <p>Link Download Asset Yang digunakan</p>
                        <p>Asset 1 
                        <a href="https://venngage.com/blog/simple-backgrounds/" target="_blank"><img src="/picture/logodownload.png" height="" widht=""></a>
                        </p>
                        <p>Asset 2
                        <a href="https://assetstore.unity.com/packages/2d/characters/sunny-land-103349" target="_blank"><img src="/picture/logodownload.png" height="" widht=""></a>
                        </p>

                    <br>

                    <p>Link Download Materi
                    <a href="https://drive.google.com/file/d/1SZiqfJiyl16zmklSojhQdeuYz_tL4sch/view?usp=sharing" target="_blank"><img src="/picture/logodownload.png" height="" widht=""></a>
                    </p>
                    <br>
                    <p>Link Source Code</p>
                    <p>Link 1
                    <a href="https://pastebin.com/KvKsphg3" target="_blank"><img src="/picture/logodownload.png" height="" widht=""></a>
                    </p>
                    <p>Link 2
                    <a href="https://pastebin.com/KvKsphg3" target="_blank"><img src="/picture/logodownload.png" height="" widht=""></a>
                    </p>
                    </div>
                </div>
            </label>

            <label class="containermenuvideo">
                <input type="radio" name="radio" id="tombolresource">
                    <p class="judulmenu">Quiz</p>
                    <div class="isi">
                        @if($material->programme_id==2)
                           <div class="deskripsimenuvideo">
                           @if($rowmaterial->done==0)
                               <a id="tombolquiz" data-toggle="modal" href="/learning/survey/{{$material->programme_id}}/{{$material->part}}">Fill Survey</a>
                           @elseif($rowmaterial->done!=0)
                               <h3>Thanks For Your Cooperation !</h3>
                               <h5>You Already Fill This Survey !</h5>
                           @endif
                           </div>
                        @else
                           <div class="deskripsimenuvideo">
                           @if($rowmaterial->quiz_score==null)
                               <a id="tombolquiz" data-toggle="modal" data-target="#modalStartQuiz">Do Quiz</a>
                           @elseif($rowmaterial->quiz_score!=null)
                               <h2>Your Score : {{$rowmaterial->quiz_score}}</h2>
                           @endif
                            </div>
                        @endif
                    </div>
            </label>

        </div>
    </div>

    <div class="learnbagiankanan">
            <h1>Lessons</h1>
            <div class="kolomlistvideo">
                @foreach($programme as $programme)
                    <li class="list-part-material">
                        @if($checkaccess=DB::table('progress')->where([['user_id',auth::user()->id],['programme_id',$programme->programme_id],['part',$programme->part]])->value('access') !=1)

                        <a class="locked" href="/learning/learn/{{$programme->programme_id}}/{{$programme->part}}">
                            <img src="/picture/locked.png" height="" widht="">{{$programme->judul_material}}</img>
                        </a>

                        @else

                        <a class="" href="/learning/learn/{{$programme->programme_id}}/{{$programme->part}}">
                            <img src="/picture/logounlock.png" height="" widht="">{{$programme->judul_material}}</img>
                        </a>

                        @endif
                    </li>
                @endforeach
            </div>
    </div>

    <div id="modalStartQuiz" class="modal fade" role="dialog">
        <div class="modal-dialog">
    <!-- Modal Alert Quiz-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="color:black;">Alert</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body" style="color:black;">
            <p>You're going to start this part quiz.</p>
            <p>The test contains 10 of questions from this part and <span style="color:red;">the score will be unchangeable in the future.</span></p>
            <p>Make sure you are ready before the test</p>
          </div>
          <div class="modal-footer">
            <button class="tombol" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a class="tombol" type="button" href="/learning/quiz/{{$material->programme_id}}/{{$material->part}}" style="display:block;">Begin the Quiz</a>
          </div>
        </div>
       </div>
    </div>

</div>

    <script>
        var $clickedlist =<?php echo $idpart-1;?>;
        $(document).ready(function () {
            $('.list-part-material').eq($clickedlist).addClass('listactive');
        });

    </script>
@endsection

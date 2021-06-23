@extends('layout/base')
@section('container')
    <div class="quizcontainer">
        <div class="quizcontainer-header">
            <h1>QUIZ RESULT</h1>
            <p>Here is your result. . .</p>
        </div>
        <div class="quizcontainer-body">
            <?php $index=0;?>
            @foreach($soalquiz as $soalquiz)
            <div class="question-container">
                <p>{{ $loop->index+=1 }}. {{$soalquiz->question}}</p>
                <p>A. {{$soalquiz->option1}}</p>
                <p>B. {{$soalquiz->option2}}</p>
                <p>C. {{$soalquiz->option3}}</p>
                <p>D. {{$soalquiz->option4}}</p>
                <p style="color:#FF367E;">
                    Your Answer :  <?php
                    switch($arrayjawaban[$index]){
                    case 1:
                    echo('A');
                    break;

                    case 2:
                    echo('B');
                    break;

                    case 3:
                    echo('C');
                    break;

                    case 4:
                    echo('C');
                    break;
                    }
                    ?>
                </p>

                <p style="color:#00FFF5;">Correct Answer : <?php
                    switch($soalquiz->correctanswer){
                    case 1:
                    echo('A');
                    break;

                    case 2:
                    echo('B');
                    break;

                    case 3:
                    echo('C');
                    break;

                    case 4:
                    echo('C');
                    break;
                    }
                ?></p>
            </div>
            <br>
                        <?php $index++;?>
            @endforeach
            <br>
            <a class="tombol"href="/learning/learn/{{$idprogramme}}/{{$idpart}}">Back to Learn</a>
            
    <div id="modalEndQuiz" class="modal fade" role="dialog">
        <div class="modal-dialog">
    <!-- Modal Alert Quiz-->
        <div class="modal-content">
          <div class="modal-header">
              <h3 class="modal-title" style="color:#00FFF5;">Congratulation !!</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body" style="color:black;">
            <p style="text-align:center;">You just finish the quiz !</p>
            <p style="text-align:center;">You Earn :</p>
            <p style="text-align:center;">EXP : <span style="color:#00FFF5;">{{$exp}}</span></p>
            <p style="text-align:center;">Poin : <span style="color:#00FFF5;">{{$poin}}</span></p>
              <div class="kotak-expbar">
                  <h2 style="color:white; text-align:center;">Lv. {{$freshdata->level}}</h2>
                  <div class="kontainer-expbar">
                      <h4>{{$freshdata->currentexp}} / 1000 EXP</h4>
                      <div class="expbar"></div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="tombol" data-dismiss="modal">Close</button>
          </div>
        </div>
       </div>
    </div>
            <div class="kotak-score">
                <div class="kotak-score-header">
                    <h3>Score</h3>
                </div>
                <div class="kotak-score-body">
                    <h1>{{$score}}</h1>
                </div>
            </div>
    <script>
    var $percent = <?php $freshuserdata=Auth::user()->fresh(); echo $freshuserdata->currentexp /10; ?>;
    $(document).ready(function(){
        $("#modalEndQuiz").modal('show');
        $(".expbar").animate({ width: $percent + "%" },2000);
    });
    </script>

        </div>
    </div>
@endsection

@extends('layout/base')
@section('container')
    <div class="quizcontainer">
        <div class="quizcontainer-header">
            <h1>Thank You !!</h1>
        </div><br />
        <div class="quizcontainer-body">
            <h3>Terima kasih telah membantu kami dengan mengisi survey ini !</h3>
            <br>
            <a class="tombol"href="/learning/learn/{{$idprogramme}}/{{$idpart}}">Back to Learn</a>
        </div>

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


    <script>
    var $percent = <?php $freshuserdata=Auth::user()->fresh(); echo $freshuserdata->currentexp /10; ?>;
    $(document).ready(function(){
        $("#modalEndQuiz").modal('show');
        $(".expbar").animate({ width: $percent + "%" },2000);
    });
    </script>


    </div>
@endsection

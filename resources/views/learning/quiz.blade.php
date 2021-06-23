@extends('layout/base')
@section('container')
    <div class="quizcontainer">
        <div class="quizcontainer-header">
            <h1>QUIZ</h1>
            <p>Read the question and choose the correct option...</p>
        </div>
        <div class="quizcontainer-body">

            <form method="post" action="/learning/quiz/{{$idprogramme}}/{{$idpart}}/check" id="formquiz">
            @foreach($quiz as $quiz)
            <div class="question-container">
                <p>{{ $loop->index+=1 }}. {{$quiz->question}}</p>

                @csrf
                    <input type="radio" name="jawaban{{$loop->index}}" value="1" required>A. {{$quiz->option1}}</input><br>
                    <input type="radio" name="jawaban{{$loop->index}}" value="2">B. {{$quiz->option2}}</input><br>
                    <input type="radio" name="jawaban{{$loop->index}}" value="3">C. {{$quiz->option3}}</input><br>
                    <input type="radio" name="jawaban{{$loop->index}}" value="4">D. {{$quiz->option4}}</input>
            </div>
            <br>
            @endforeach
            <br>
            <button class="tombol" style="color:black;" type="button" data-toggle="modal" data-target="#modalStartQuiz">Finalize</button>
            
    <div id="modalStartQuiz" class="modal fade" role="dialog">
        <div class="modal-dialog">
    <!-- Modal Alert Quiz-->
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="color:black;">Finalize</h4>
            <button type="button" class="close" data-dismiss="modal" >&times;</button>
          </div>
          <div class="modal-body" style="color:black;">
            <p>Finalize your answer?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="tombol" data-dismiss="modal">Close</button>
            <button type="submit" class="tombol" form="formquiz">Finalize</button>
          </div>
        </div>
       </div>
    </div>

            </form>
        </div>
    </div>
@endsection

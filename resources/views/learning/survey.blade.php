@extends('layout/base')
@section('container')
    <div class="quizcontainer">
        <div class="quizcontainer-header">
            <h1>Survey</h1>
            <p>Please help us by fill this survey below, thank you.</p><br /><br>
        </div>
        <div class="quizcontainer-body">

            <form method="post" action="/learning/survey/{{$idprogramme}}/{{$idpart}}/submit" id="formsurvey">
                @csrf
                <h4>Setelah menonton video tersebut, apa kesan dan pesan dari anda?</h4>
                <textarea required maxlength="1000" minlength="100" style="color:black; border-radius:3px;" rows="8" cols="100" name="kesanpesan" form="formsurvey"></textarea>

                <br />
<br />
                <button class="tombol" style="color:black;" type="button" data-toggle="modal" data-target="#modalStartQuiz">Submit</button>

                <div id="modalStartQuiz" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal Alert Quiz-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" style="color:black;">Submit</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body" style="color:black;">
                                <p>Submit your survey?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="tombol" data-dismiss="modal">Close</button>
                                <button type="submit" class="tombol" form="formsurvey">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

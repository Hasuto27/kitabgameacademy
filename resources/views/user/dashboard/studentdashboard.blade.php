@extends('layout/base')
@section('container')

    <div class="bagian-progress-course">
        <h2>My Progress</h2><br />
        @if($dbmyprogramme != 0)
            <div class="bagian-progress-course-satuan">
                <div class="bagian-progress-course-satuan-kiri">
                    <p>{{$programme->title}}</p>
                </div>
                <div class="bagian-progress-course-satuan-tengah">
                    <div class="kotakprogressbar">
                        <div class="progressbar"></div>
                    </div>
                </div>
                <div class="bagian-progress-course-satuan-kanan">
                    <p><?php if($jumlahpart !=0){echo $progress/$jumlahpart*100;}else {echo(0);}?>% ({{$progress}}/{{$jumlahpart}}) Parts</p>
                </div>
            </div>
        @else
            <div class="notfoundmessage">
               <img src="/picture/maskotmessage.png" width="500px" height=""></img>
               <div class="themessage">
                    <p>No Programme Found...</p>
               </div>
            </div>
        @endif
    </div>

<script>
        var $percent = <?php if($jumlahpart !=0){echo $progress/$jumlahpart*100;}else {echo(0);}?>;
    $(document).ready(function(){

            $(".progressbar").animate({ width: $percent + "%" },2000);

    });
</script>
@endsection


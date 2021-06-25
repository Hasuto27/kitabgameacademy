@extends('layout/base')
@section('container')

    <div class="bagian-progress-course">
        <h2>My Progress</h2><br />
        @if($countmyprogramme != 0)
            @foreach($dbmyprogramme as $dbmyprogramme)
            <div class="bagian-progress-course-satuan">
                <div class="bagian-progress-course-satuan-kiri">
                    <p>{{$dbmyprogramme->programme_name}}</p>
                </div>

                <div class="bagian-progress-course-satuan-tengah">
                    <div class="kotakprogressbar">
                        <?php
                       $part = $dbprogress->where('programme_id',$dbmyprogramme->programme_id);
                       $jumlahpart = $part->count();
                       $progress = $part->where('done',1)->count();
                       if($jumlahpart!=0){$percent = $progress / $jumlahpart * 100;}else{$percent =0;}
                        ?>
                        <div style="width:<?php echo$percent;?>%"class="progressbar"></div>

                    </div>
                </div>
                <div class="bagian-progress-course-satuan-kanan">
                    <p><?php
                       if($jumlahpart != 0){echo $progress/$jumlahpart*100;}else {echo(0);}?>% ({{$progress}}/{{$jumlahpart}}) Parts</p>

                </div>
            </div>
        @endforeach
        @else
            <div class="notfoundmessage">
               <img src="/picture/maskotmessage.png" width="500px" height=""></img>
               <div class="themessage">
                    <p>No Programme Found...</p>
               </div>
            </div>
        @endif
    </div>


@endsection


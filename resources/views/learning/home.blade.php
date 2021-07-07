@extends('layout/base')
@section('container')
<h1>My Programme</h1></br>

@foreach($dbmyprogramme as $key=>$dbmyprogramme)

    <div class="profile-container-myprogramme">
                        <?php
                $deskripsi=$dbprogramme->where('id',$dbmyprogramme->programme_id);
                ?>
        <div class="profile-container-myprogramme-left">
            <img src="{{$dbmyprogramme->link_gambar}}" width="300px" height="200px"></img>
        </div>
        <div class="profile-container-myprogramme-right">
             <h2>{{$dbmyprogramme->programme_name}}</h2>
             <p>{{$deskripsi->pluck('deskripsi')->first()}}</p>
             <?php
                       $part = $dbprogress->where('programme_id',$dbmyprogramme->programme_id);
                       $jumlahpart = $part->count();
                       $progress = $part->where('done',1)->count();
                       if($jumlahpart!=0){$percent = $progress / $jumlahpart * 100;}else{$percent =0;}
                        ?>
                    <h5 style="color:#00FFF5;">Progress</h5>
                    <p style="opacity:.7;">Completed {{$progress}} of {{$jumlahpart}}</p>
            <a style="color:#00FFF5; font-weight:bold;"href="/learning/learn/{{$dbmyprogramme->programme_id}}/1">Continue Learning</a>
        </div>
    </div>

@endforeach
            @if($countmyprogramme <= 0 )
            <div class="notfoundmessage">
               <img src="/picture/maskotmessage.png" width="500px" height=""></img>
               <div class="themessage">
                    <p>You don't owned any programme yet...</p>
  
               </div>
            </div>
            @endif

@endsection

@extends('layout/profilebase')
@section('headerprofile')
My Programme
@endsection
@section('containerbodyprofile')
@foreach($myprogramme as $myprogramme)
    <div class="profile-container-myprogramme">
        <div class="profile-container-myprogramme-left">
            <img src="{{$myprogramme->link_gambar}}" height="180px" width="140px"></img>
        </div>
        <div class="profile-container-myprogramme-right">
             <h2>{{$myprogramme->programme_name}}<h2>
             <p>Basic tutorial using Unity Engine for newbie. learn how to use unity engine properly, how to basic proggraming with C# and how to basic animation.</p>
             <h3>Progress</h3>
             <p>Completed 0 of 0</p>
             <a href="/learning/learn/{{$myprogramme->programme_id}}/1">Continue Learning</a>
        </div>
    </div>
@endforeach
            @if($myprogramme->count() <= 0 )
            <div class="notfoundmessage">
               <img src="/picture/maskotmessage.png" width="500px" height=""></img>
               <div class="themessage">
                    <p>You don't owned any programme yet...</p>
  
               </div>
            </div>
            @endif
@endsection

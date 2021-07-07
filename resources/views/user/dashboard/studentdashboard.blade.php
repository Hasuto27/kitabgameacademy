@extends('layout/base')
@section('container')

<div class="container-dashboard">
    
    <div class="container-dashboard-kiri">
        <div class="bagian-profile">
            <div class="template-dashboard-profile" id="frame-dashboard-profile-top"><img src="/picture/dashboard-profile-top.png" alt="Alternate Text" /></div>

            <div class="bagian-profile-kiri">
                <img src="/picture/profilepic.png" alt="Alternate Text" width="160px" height="160px"/>
            </div>

            <div class="bagian-profile-tengah">
                <h2 style="color:#FF367E; font-weight:bold; padding-bottom:10px;">{{Auth::user()->name}}</h2>
                <p>Private - GAME TECHNOLOGY</p>
            </div>

            <div class="bagian-profile-kanan">
                <img width="300px" height="90px" src="/picture/pangkat.png" alt="Alternate Text" />
            </div>
            <div class="template-dashboard-profile" id="frame-dashboard-profile-bot"><img src="/picture/dashboard-profile-bot.png" alt="Alternate Text" /></div>
        </div>
 </div>

    <div class="container-dashboard-kanan">
            <div class="bagian-mrp">
                  <h4>MILITARY RATION : <img src="/picture/mrp.png" alt="Alternate Text" /><span class="bagian-mrp-poin">{{Auth::user()->militaryration}}</span></h4>
            </div>
    </div>


</div>

<div class="container-dashboard">
    
    <div class="container-dashboard-kiri">
        <div class="bagian-progress-course">
        <h2>My Progress</h2><br />
        @if($countmyprogramme != 0)
            @foreach($dbmyprogramme as $key=>$dbmyprogramme)
            <div class="bagian-progress-course-satuan">
                <?php
                $deskripsi=$dbprogramme->where('id',$dbmyprogramme->programme_id);
                ?>
                <div class="bagian-progress-course-satuan-kiri">
                    <img src="{{$dbmyprogramme->link_gambar}}" width="210px" height="140px"></img>
                </div>

                <div class="bagian-progress-course-satuan-kanan">
                     <h3>{{$dbmyprogramme->programme_name}}</h3><br />

                    <p>{{$deskripsi->pluck('deskripsi')->first()}}</p>
                                            <?php
                       $part = $dbprogress->where('programme_id',$dbmyprogramme->programme_id);
                       $jumlahpart = $part->count();
                       $progress = $part->where('done',1)->count();
                       if($jumlahpart!=0){$percent = $progress / $jumlahpart * 100;}else{$percent =0;}
                                            ?>
                    <h5 style="color:#00FFF5;">Progress</h5>
                    <p style="opacity:.7;">Completed {{$progress}} of {{$jumlahpart}}</p>
                    <div class="kotakprogressbar">
                        <div class="persenprogress"><p><?php if($jumlahpart != 0){echo $progress/$jumlahpart*100;}else {echo(0);}?>%</p></div>
                        <div style="width:<?php echo$percent;?>%"class="progressbar"></div>
                    </div>
                    <a style="color:#00FFF5; font-weight:bold;"href="/learning/learn/{{$dbmyprogramme->programme_id}}/1">Continue Learning</a>

                </div>

            </div>
        @endforeach
        @else
              <h1>N/A</h1>
        @endif
    </div>
 </div>

    <div class="container-dashboard-kanan">
            <div class="bagian-schedule">
                <div class="bagian-schedule-header">
                    <h2>My Schedule</h2>
                </div>

                <div class="bagian-schedule-body">
                    @if($countschedule !=0)
                        @foreach($dbschedule as $key=>$dbschedule)
                    <li>
                        <h4>{{$dbschedule->activity}}</h4>
                        <p>{{$dbschedule->date}}, {{$dbschedule->starttime}} - {{$dbschedule->endtime}}</p>
                    </li>
                    @endforeach
                    @else
                        <h1>N/A</h1>
                    @endif
                </div>
            </div>
    </div>


</div>



@endsection


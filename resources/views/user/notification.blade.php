@extends('layout/base')
@section('container')
<br><br>
<table class="table">
  <thead style="color:white;">
    <tr>
      <th scope="col">NID</th>
      <th scope="col">Topic</th>
      <th scope="col">Message</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody style="color:white;">
    @foreach($notification as $notification)
    <tr>
      <th scope="row">{{$notification->id}}</th>
      <td>{{$notification->topic}}</td>
      <td>{{$notification->content}}</td>
      <td>{{$notification->created_at}}</td>
      <td>
          <form method="post" action="/notification/delete">
              @method('delete')
                @csrf
              {{--<a href="/notification/{{$notification->id}}" class="badge badge-success">open</a> --}}
              <button name="idnotif" value="{{$notification->id}}" class="badge badge-danger">Delete</button>
          </form>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection

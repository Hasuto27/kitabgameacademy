@extends('layout/base')
@section('container')
<br><br>

    <div class="card" style="width: 18rem; color:black;">
      <div class="card-header">
        Detail
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Name = {{$user->name}}</li>
        <li class="list-group-item">Millitary Ration = {{$user->militaryration}}</li>
      </ul>
    </div>

    <br>
<form method="post" action="/test/plusmilitaryration/{{$user->id}}">
@method('patch')
@csrf
  <div class="mb-3">
    <label for="militaryration" class="form-label">Jumlah Military Ration yang ditambah</label>
    <input type="text" class="form-control" id="militaryration" aria-describedby="emailHelp" name="militaryration" required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

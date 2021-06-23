@extends('layout/base')
@section('container')
<br><br>

    <div class="card" style="width: 18rem; color:black;">
      <div class="card-header">
        Detail
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Name = {{$user->name}}</li>
        <li class="list-group-item">Level = {{$user->level}}</li>
        <li class="list-group-item">EXP = {{$user->currentexp}}</li>
      </ul>
    </div>

    <br>
<form method="post" action="/test/{{$user->id}}">
@method('patch')
@csrf
  <div class="mb-3">
    <label for="exp" class="form-label">Jumlah EXP yang ditambah</label>
    <input type="text" class="form-control" id="exp" aria-describedby="emailHelp" name="currentexp" required>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection

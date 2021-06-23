@extends('layout/base')
@section('container')
<br>
<h1>Game Technology Basic</h1>
<br><br>
<form method="post" action="/checkout/calculate">
    <h2>Price : Rp.{{$programme->price}}<h2>
    <h3>Military Ration : {{Auth::user()->militaryration}}</h3>
    <br><br><br>
    <h4>Get Discount With MR Point</h4>

    @csrf
        <select name="pilihandiskon" class="opsidiskon" aria-label=".form-select-sm example">
          <option value="1">None</option>
          <option id="disc10" value="2" <?php if(Auth::user()->militaryration<1000){echo'disabled';} ?>>10% Off, 1000 MR</option>
          <option id="disc24" value="3" <?php if(Auth::user()->militaryration<2000){echo'disabled';} ?>>24% Off, 2000 MR</option>
          <option id="disc37" value="4" <?php if(Auth::user()->militaryration<3000){echo'disabled';} ?>>37% Off, 3000 MR</option>
          <option id="disc41" value="5" <?php if(Auth::user()->militaryration<4000){echo'disabled';} ?>>41% Off, 4000 MR</option>
          <option id="disc50" value="6" <?php if(Auth::user()->militaryration<5000){echo'disabled';} ?>>50% Off, 5000 MR</option>
        </select>
        <button type="submit">CheckOut</button>
    </form>
@endsection

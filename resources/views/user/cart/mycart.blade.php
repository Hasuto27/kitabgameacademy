@extends('layout/base')
@section('container')
<div class="mycart">

    <div class="mycart-left">
        <h1>My Cart</h1>
        <?php
           $totalharga=0;
        ?>
            @foreach($item as $item)
            <?php
            $totalharga+=$item->programme_price
            ?>
        <div class="cartcontainer">
            <div class="cartcontainer-left">
                <img src="{{$item->link_gambar}}" width="200px" height="100px"></img>
            </div>

            <div class="cartcontainer-middle">
                <p class="judulprogrammecart">{{$item->programme_name}}</p>
            </div>

            <div class="cartcontainer-right">
                <p class="hargaprogrammecart">Rp.{{$item->programme_price}}<p>
                <form method="post" action="/user/cart/mycart/delete">
                @method('delete')
                @csrf
                <button name="idcart" value="{{$item->id}}">Remove</button>
                </form>
            </div>
        </div>
            @endforeach
            @if($item->count() <= 0 )
            <div class="notfoundmessage">
               <img src="/picture/maskotmessage.png" width="500px" height=""></img>
               <div class="themessage">
                    <p>Nothing in Cart...</p>
               </div>
            </div>
            @endif
    </div>


    <div class="mycart-right">
        <div class="totalpricecontainer">
            <div class="isitotalprice">
                <p>Original Price : Rp. {{$totalharga}}</p>
                <p>Discount : -</p><br>
                <p style="font-weight:bold;">Total : Rp. {{$totalharga}}</p>
                <br><br>
                <form method="post" action="/mycart/checkout">
                @csrf
                <button>Check Out</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

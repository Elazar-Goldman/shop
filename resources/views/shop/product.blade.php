@extends('template')
@section('content')
<div class="row">
    <div class="col-md-7">
        <h1>{{strtoupper($product->pro_name)}}</h1>
        <p> {{$product->pro_description}}</p>
        <p>only for: &#8362; {{$product->pro_price}}</p>
        <form id="add-to-cart" method="post" action="{{url('add-to-cart')}}" >
             @csrf
            <div class="number">
                <span class="minus">-</span>
                <input type="text" name="quantity" value="1" readonly>
                <span class="plus">+</span><br><br>
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
               <input type="hidden" name="id" value="{{$product->id}}">
        </form>
    </div>
    <div class="col-md-5"><img src="{{asset('images/products/'.$product->pro_img)}}"></div>
  
</div>

@endsection
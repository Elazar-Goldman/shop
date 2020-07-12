@extends('template')
@section('content')
<div class="row">
    <div class="col-md-7">
        <h1>{{strtoupper($product->pro_name)}}</h1>
        <p> {{$product->pro_description}}</p>
        <p>only for: &#8362; {{$product->pro_price}}</p>
            <form>
            <div class="number">
                <span class="minus">-</span>
                <input type="text" value="1"/>
                <span class="plus">+</span><br><br>
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </form>
    </div>
    <div class="col-md-5"><img src="{{asset('images/products/'.$product->pro_img)}}"></div>
  
</div>

@endsection
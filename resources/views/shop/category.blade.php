@extends('template')

@section('content')

 <h1 class="mb-5">{{strtoupper($category->slug)}}</h1>
 <div class="row">
     
 <form  method="POST" action="{{url()->current().'/sort-low-cart'}}">
                    @csrf
                    <input type="submit" class="btn-info" value="Sort by Low perice">
   </form>

  <form  method="POST" action="{{url()->current().'/sort-high-cart'}}">
                    @csrf
                    <input type="submit" class="btn-warning ml-3" value="Sort by high perice">
   </form>
     
     </div>

 

@if($category->products->isEmpty())
<h3>We dont have any products</h3>
@endif

         
<div class="row">

    @foreach ($category->products as $product)
    <div class="col-md-4 mb-5">
        <div calss="pro-container m-5 mb-5">
            <h3>{{strtoupper($product->pro_name)}}</h3>
           <a  href="{{url()->current().'/'.$product->slug}}"><image class="pro-img"  src="{{asset('storage/'.$product->pro_img)}}"></a>
           <h4> &#8362; {{$product->pro_price}}</h4>
           <a class="btn btn-primary add-to-cart" href="{{url('add-to-cart/'.$product->id)}}">Add To Cart</a>
           <a class="btn btn-info" href="{{url()->current().'/'.$product->slug}}">Read more</a>
        </div>

    </div>
@endforeach
@endsection
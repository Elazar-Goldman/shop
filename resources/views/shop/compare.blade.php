@extends('template')

@section('content')

<h1> {{strtoupper($category['category']->slug)}}</h1>
 <div class="row">
 <form  method="POST" action="{{url('shop/'.$category['category']->slug.'/sort-low-cart')}}">
                    @csrf
                    <input type="submit" class="btn-info" value="Sort by Low perice">
   </form>
 
  <form  method="POST" action="{{url('shop/'.$category['category']->slug.'/sort-high-cart')}}">
                    @csrf
                    <input type="submit" class="btn-warning ml-3" value="Sort by high perice">
   </form>
 </div>

<div class="row">
 @foreach ($category['products'] as $product)
    <div class="col-md-4 mb-5">
        <div calss="pro-container ml-5 mb-5">
            <h3>{{strtoupper($product->pro_name)}}</h3>
           <a  class="stretched-link" href="{{url('shop/'.$category['category']->slug.'/'.$product->slug)}}"><image class="pro-img" src="{{asset('storage/'.$product->pro_img)}}"></a>
           <h4> &#8362; {{$product->pro_price}}</h4>
           <a class="btn btn-primary add-to-cart" href="{{url('add-to-cart/'.$product->id)}}">Add To Cart</a>
           <a class="btn btn-info" href="{{url('shop/'.$category['category']->slug.'/'.$product->slug)}}">Read more</a>
        </div>

    </div>
        @endforeach
        
</div>
@endsection
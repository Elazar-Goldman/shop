@extends('template')

@section('content')
<h1 class="mb-5">{{strtoupper($category->cat_name)}}</h1>

@if($category->products->isEmpty())
<h3>We dont have any products</h3>
@endif
<div class="row">
    @foreach ($category->products as $product)
    <div class="col-md-4 mb-5">
        <div calss="pro-container">
            <h3>{{strtoupper($product->pro_name)}}</h3>
           <a class ="stretched-link" href=""><image src="{{asset('images/products/' . $product->pro_img)}}"></a>
           <h4> &#8362; {{$product->pro_price}}</h4>
           <a class="btn btn-primary" href="">Add To Cart</a>
           <a class="btn btn-info" href="">Read more</a>
        </div>

    </div>
@endforeach
@endsection
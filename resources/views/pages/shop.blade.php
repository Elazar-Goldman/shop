@extends('template')

@section('content')
<h1 class="mb-5">Shop page</h1>
{{dd($categories)}}
<div class="row">
    <div class="col-md-4">
        <div calss="cat-container">
            <h3>Players</h3>
           <a href="{{url('shop/players')}}"><image src="{{asset('images/categories/player.jpg')}}"></a>
        </div>
    </div>
    <div class="col-md-4">
        <div calss="cat-container">
            <h3>Foot Ball</h3>
           <a href="{{url('shop/foot_balls')}}"><image src="{{asset('images/categories/foot_ball.png')}}"></a>
        </div>
    </div>
     <div class="col-md-4">
        <div calss="cat-container">
            <h3>Helmets</h3>
           <a href="{{url('shop/helmets')}}"><image src="{{asset('images/categories/helmet.png')}}"></a>
        </div>
    </div>
     <div class="col-md-4">
        <div calss="cat-container">
            <h3>Pizza</h3>
           <a href="{{url('shop/pizzas')}}"><image src="{{asset('images/categories/pizza.png')}}"></a>
        </div>
    </div>
     <div class="col-md-4">
        <div calss="cat-container">
            <h3>Tickets</h3>
           <a href="{{url('shop/tickets')}}"><image src="{{asset('images/categories/tickets.png')}}"></a>
        </div>
    </div>

</div>

@endsection
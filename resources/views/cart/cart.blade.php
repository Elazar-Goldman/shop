@extends('template')

@section('content')
@if($items->isEmpty())
<h3>Your cart is empty: <a href="{{url('shop')}}">start your shop </a></h3>

@else
<h1>Your cart</h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total (&#8362;)</th>
    </tr>
  </thead>
  <tbody>
@foreach($items as $item)
<tr>
    <td class="delete"><a class="delete-product text-danger" href="{{url('delete-item/'.$item->rowId)}}">X</a></td>
    <td>{{$item->name}}</td>
    <td>{{$item->price}}</td>
    <td>
       <form class="update-cart" method="post" action="{{url('update-cart')}}">
                    @csrf
                    <div class="number">
                        <span class="minus">-</span>
                        <input class="product-quantity" type="text" value="{{$item->qty}}" readonly name="quantity">
                        <span class="plus">+</span>
                    </div>
                    <input type="hidden" value="{{$item->rowId}}" name="rowId">
                </form>
    </td>
    <td class="product-total">{{number_format($item->total)}}</td>
</tr>
@endforeach
  </tbody>
  <tfoot>
      <tr>
          <th colspan="4">Total </th>
          <td class="cart-total">{{$total}}</td>
          
      </tr>
  </tfoot>
</table>

  <a class="delete-cart" href="{{url('delete-cart')}}"> Delete Cart</a>
 <p class="clearfix"> <a href="" class="btn btn-primary float-right"> Place Order </a></p>
 @endif
  @endsection
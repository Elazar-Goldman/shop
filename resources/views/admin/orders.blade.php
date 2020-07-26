@extends('admin.template')
@section('admin-content')
<h1>Orders</h1>

@if($orders->isEmpty())
<p>no orders</p>
@else
<div class="table-responsive">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Content</th>
      <th scope="col">User Id</th>
      <th scope="col">Created at</th>
    </tr>
  </thead>
  <tbody>
      @foreach($orders as $order)
    <tr>
      <th scope="row">{{$order->id}}</th>
      <td>@foreach(json_decode($order->order_list) as $item)
          <p>
              {{$item->name.'- '.$item->qty.' X '. $item->price.' = '.$item->subtotal}}
          </p>
      
          @endforeach
      </td>
      <td>{{$order->user_id}}</td>
      <td>{{$order->created_at}}</td>
    </tr>
    @endforeach
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>
@endif



@endsection
@extends('template')
@section('content')
<div class="row">
    <div class='col-md-3'>
        <div class="row">
  <div class="col-3">
    <div class="nav flex-column nav-pills" >
      <a class="nav-link {{Request::path()== 'admin'? 'active': ''}}"   href="{{url('admin')}}" >Welcome</a>
      <a class="nav-link {{Request::is('admin/orders')? 'active': ''}}"  href="{{url('admin/orders')}}" >Orders</a>
      <a class="nav-link {{Request::is('admin/categories*')? 'active': ''}}"   href="{{url('admin/categories')}}" >Categories</a>
      <a class="nav-link {{Request::is('admin/products*')? 'active': ''}}""  href="{{url('admin/products')}}">Products</a>
      <a class="nav-link {{Request::is('admin/users*')? 'active': ''}}""  href="{{url('admin/users')}}">Users</a>
      <a class="nav-link {{Request::is('admin/pages*')? 'active': ''}}""  href="{{url('admin/pages')}}">Pages</a>
    </div>
  </div>
</div>
        
    </div>
    <div class='col-md-9'>
        @yield('admin-content')
        
    </div>
    
    
    
</div>


  @endsection
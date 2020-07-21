@extends('template')

@section('content')
<h1>Log in</h1>
<div class="row">
    <div class="col-md-8">
        <form class="clearfix" method="post" action="{{url('login')}}">
            @csrf        
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
      
  <button type="submit" class="btn btn-primary float-right">Login</button>
</form>
        
        
    </div>
        
</div>

@endsection
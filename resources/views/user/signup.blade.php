@extends('template')

@section('content')
<h1>Sign up </h1>
<div class="row">
    <div class="col-md-8">
        <form class="clearfix" method="post" action="{{url('signup')}}">
            @csrf
     <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>        
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
   <div class="form-group">
    <label for="password_confirmation">Reenter password</label>
    <input type="password" class="form-control" id="repassword" name="password_confirmation">
  </div>        
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
        
        
    </div>
        
</div>

@endsection
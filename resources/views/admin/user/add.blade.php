@extends('admin.template')
@section('admin-content')
<h1>Add new Users</h1>
<div class="row">
    <div class="col-md-8">
        <form class="clearfix" method="post" action="{{url('admin/users')}}">
            @csrf
     <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" id="name">
  </div>        
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email">
 
  </div>
    <div class="form-group">
    <label for="role">User Role</label>
      <select class="form-control form-control-sm" id="role" name="role">
        <option value="0">Chose User role</option>
        @foreach ($roles as $role)
        <option value="{{$role->id}}"> {{$role->name}} </option>
       @endforeach
</select>
    
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
        
@endsection
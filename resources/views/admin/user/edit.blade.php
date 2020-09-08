@extends('admin.template')
@section('admin-content')
<h1>Edit Users</h1>
<div class="row">
    <div class="col-md-8">
        <form class="clearfix" method="post" action="{{url('admin/users/'.$user->id)}}">
            @csrf
            @method('PUT')
     <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" id="name" value='{{old('name', $user->name)}}'>
  </div>        
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value='{{old('email', $user->email)}}'>
 
  </div>
    <div class="form-group">
    <label for="role">User Role</label>
    <select class="form-control form-control-sm" id="role" name="role" {{($user->id== session('id'))? 'disabled' : ''}}>
        <option value="0">Chose User role</option>
        @foreach ($roles as $role)
        <option value="{{$role->id}}" {{($role->id == old('role', $user->role_id))?'selected':''}}> {{$role->name}} </option>
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
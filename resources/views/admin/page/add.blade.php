@extends('admin.template')
@section('admin-content')
<h1>Add New Page</h1>
<form method="post" action="{{url('admin/pages')}}" class="clearfix">
  
    @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
  </div>
    
  <div class="form-group">
    <label for="content" >Content</label>
    <textarea class="form-control" id="content" name="content" rows='10'>{!! old('content') !!} </textarea>
  </div>

  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

@endsection
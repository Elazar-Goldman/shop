@extends('admin.template')
@section('admin-content')
<h1>Edit Category</h1>
<form method="post" action="{{url('admin/categories/'.$category->id)}}" enctype="multipart/form-data" class="clearfix">
     @method('PUT')
    @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$category->cat_name}}">
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
  </div>
      <div class="form-group">
          <img src="{{asset('storage/'.$category->cat_img)}}" class="admin-thumbnail"s>
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image" name="image">
    <p>Leave empty to keep the original picture</p>
  </div>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

@endsection
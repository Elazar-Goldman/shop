@extends('admin.template')
@section('admin-content')
<h1>Add New Category</h1>
<form method="post" action="{{url('admin/categories')}}" enctype="multipart/form-data" class="clearfix">
    @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug">
  </div>
      <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

@endsection
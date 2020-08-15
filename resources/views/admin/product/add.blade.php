@extends('admin.template')
@section('admin-content')
<h1>Add New Product</h1>
@if($categories->isEmpty())
<h2>You must first have at least <a href="{{url('admin/categories/create')}}">one Category</a></h2>
@else
<form method="post" action="{{url('admin/products')}}" enctype="multipart/form-data" class="clearfix">
  
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
    <label for="category">Chose Category</label>
    <select class="form-control form-control-sm" id="category" name="category">
        <option value="0">Chose Category</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}"> {{$category->cat_name}} </option>
       @endforeach
</select>
    
    </div>

    <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" name="price" step="0.1">
  </div>
     <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div>
    
      <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
@endif
@endsection
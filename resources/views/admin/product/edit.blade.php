@extends('admin.template')
@section('admin-content')
<h1>Edit Product</h1>

<form method="post" action="{{url('admin/products/'.$product->id)}}" enctype="multipart/form-data" class="clearfix">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $product->slug)}}">
  </div>
    
    <div class="form-group">
    <label for="category">Chose Category</label>
    <select class="form-control form-control-sm" id="category" name="category">
        <option value="0">Chose Category</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}" {{ $category->id == old('category', $product->category->id)? 'selected': ''}}> {{$category->cat_name}} </option>
       @endforeach
</select>
    
    </div>

    <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" name="price" step="0.1" value="{{old('price', $product->pro_price)}}">
  </div>
     <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3">{{old('description', $product->pro_description)}}</textarea>
  </div>
    
      <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
@endsection
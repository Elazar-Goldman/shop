@extends('admin.template')
@section('admin-content')
<h1>Edut Page</h1>
<form method="post" action="{{url('admin/pages/'.$page->id)}}" class="clearfix">
  
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $page->name)}}">
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $page->slug)}}">
  </div>
    
  <div class="form-group">
    <label for="content" >Content</label>
    <textarea class="form-control" id="content" name="content" rows='10'>{!! old('content', $page->content) !!} </textarea>
  </div>

  <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>

@endsection
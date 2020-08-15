@extends('template')

@section('content')
<h1 class="mb-5">Shop page</h1>
@if($categories->isEmpty())
<h2>We are all out... can you belive that?!</h2>
@endif
<div class="row">
    @foreach ($categories as $category)
    <div class="col-md-4 mb-5">
        <div calss="cat-container">
            <h3>{{strtoupper($category->cat_name)}}</h3>
           <a class ="stretched-link" href="{{url('shop/'.$category->slug)}}"><image src="{{asset('storage/'.$category->cat_img)}}"></a>
        </div>
        

    </div>
@endforeach
</div>
@endsection
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-sm-12">
    @if(session()-> has('message'))
                  <div class="alert alert-success">
                        {{ session() -> get('message') }}
                  </div>
            @endif
         <h3 class="text-center">  Edit The Category </h3>
         <form action="{{url('/categories/'.$category->id)}}" method="post" enctype="multipart/form-data">
         @csrf
         @method('patch')
         @if($errors->has('name') )
                <p class="alert alert-danger"> {{$errors->first('name')}}  </p>
                @endif
            <input class="form-control mb-2" type="text" name="name"  value="{{old('name')?? $category->name }}" > 
            <input class="form-control mb-2" type="file"  name="image"> 
            <img style="width:200px;display:block" src="{{ asset('uploads/categories/'.$category->image ) }}" class="img-responsive img-thumbnil"  alt="">
            <button type="submit" class="btn btn-warning"> <i class='fa fa-pencil'></i>  Edit Category </button>
         </form>
    
    </div>
    </div>
</div>





@endsection
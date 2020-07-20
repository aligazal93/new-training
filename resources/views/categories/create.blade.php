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
         <h3 class="text-center">  Create New Category </h3>
         <form action="categories" method="post">
         @csrf
         @if($errors->has('name') )
                <p class="alert alert-danger"> {{$errors->first('name')}}  </p>
                @endif
            <input class="form-control mb-2" type="text" placeholder=" Enter The Name Of Category" name="name"  value="{{old('name')}}" > 
            <button type="submit" class="btn btn-success"> Add New Category </button>
         </form>
    
    </div>
    </div>
</div>





@endsection
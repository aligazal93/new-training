@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-sm-12">
         <h3 class="text-center">  Create New User </h3>
         <form action="{{url('/users/'.$user->id)}}" method="post">
         @method('PATCH')
         @csrf
            @if($errors->has('name') )
             <p class="alert alert-danger"> {{$errors->first('name')}}  </p>
            @endif
            <input class="form-control mb-2" type="text" name="name"  value="{{old('name')??$user->name}}" > 
            @if($errors->has('email') )
             <p class="alert alert-danger"> {{$errors->first('email')}}  </p>
            @endif   
            <input class="form-control mb-2" type="text" name="email"  value="{{old('email')??$user->email}}">
            @if($errors->has('password') )
             <p class="alert alert-danger"> {{$errors->first('password')}}  </p>
            @endif           
            <input class="form-control mb-2" type="password"  name="password"  value="{{old('password')??$user->password }}">
            <button type="submit" class="btn btn-success"> Create </button>
         </form>
    
    </div>
    </div>
</div>





@endsection
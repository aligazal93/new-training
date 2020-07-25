@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-sm-12">
         <h3 class="text-center">  Edit Your Profile </h3>
         <form action="{{url('/profile/update')}}" method="post" enctype="multipart/form-data">
         @method('PATCH')
         @csrf
         <img src="{{ asset('uploads/users/'.$user->image ) }}" class="img-responsive img-thumbnil" style="width:150px;height:150px;border-radius:150px;display: block;margin: 0 auto;margin-bottom:25px;"  alt="">
         <input type="file" class="form-control mb-2" name='image'>

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

            <button type="submit" class="btn btn-warning"> <i class='fa fa-pencil'></i> Edit </button>
         </form>
    
    </div>
    </div>
</div>





@endsection
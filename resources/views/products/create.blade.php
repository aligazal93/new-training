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


          <h4 class="text-center mb-10">Add New Product</h4>
            <form action="products" method="post" enctype="multipart/form-data">
            @csrf

                @if($errors->has('name') )
                <p class="alert alert-danger"> {{$errors->first('name')}}  </p>
                @endif

                <input class="form-control mb-2" type="text" placeholder=" Product Name" name="name"  value="{{old('name')}}" > 
                @if($errors->has('details') )
                <p class="alert alert-danger"> {{$errors->first('details')}}  </p>
                @endif
                
                <input class="form-control mb-2" type="text" placeholder=" Product Description" name="details"  value="{{old('details')}}">
                @if($errors->has('price') )
                <p class="alert alert-danger"> {{$errors->first('price')}}  </p>
                @endif
                <input class="form-control mb-2" type="text" placeholder=" Product Price" name="price"  value="{{old('price')}}" >
                @if($errors->has('count') )
                <p class="alert alert-danger"> {{$errors->first('count')}}  </p>
                @endif
                <input class="form-control mb-2" type="text" placeholder=" Product Count" name="count"  value="{{old('count')}}" >
                @if($errors->has('available') )
                <p class="alert alert-danger"> {{$errors->first('available')}}  </p>
                @endif
                <select class="form-control mb-2" name="available" id=""  value="{{old('avableail')}}">
                    <option value="" > Choose a State </option>
                    <option value="0"> Not Availiable Now </option>
                    <option value="1"> Availiable Now </option>
                </select>

                <select class="form-control mb-2" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                @endforeach    
                </select>

                <input type="file" class="form-control mb-1" name='image' >

                


                <button type="submit" class="btn btn-success"> Add New Product </button>
            </form>
          </div>
         </div>
    </div>

    @endsection
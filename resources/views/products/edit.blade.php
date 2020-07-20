@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-sm-12">


          <h4 class="text-center mb-10">Edit The Product</h4>
            <form action="{{url('/products/'.$product->id)}}" method="post">
            @method('PATCH')
            @csrf

                @if($errors->has('name') )
                <p class="alert alert-danger"> {{$errors->first('name')}}  </p>
                @endif

                <input class="form-control mb-2" type="text"  name="name"  value="{{old('name')??$product->name }}" > 
                @if($errors->has('details') )
                <p class="alert alert-danger"> {{$errors->first('details')}}  </p>
                @endif
                
                <input class="form-control mb-2" type="text" name="details"  value="{{old('details')??$product->details }}">
                @if($errors->has('price') )
                <p class="alert alert-danger"> {{$errors->first('price')}}  </p>
                @endif
                <input class="form-control mb-2" type="text" name="price"  value="{{old('price')??$product->price}}" >
                @if($errors->has('count') )
                <p class="alert alert-danger"> {{$errors->first('count')}}  </p>
                @endif
                <input class="form-control mb-2" type="text"  name="count"  value="{{old('count')??$product->count}}" >
                @if($errors->has('available') )
                <p class="alert alert-danger"> {{$errors->first('available')}}  </p>
                @endif
                <select class="form-control mb-2" name="available" id=""  value="{{old('available')??$product->available}}">
                    <option value="" > Choose a State </option>
                    <option value="0" {{$product->available =='Not available' ? 'selected="selected" ' : '' }}> Not Availiable </option>
                    <option value="1" {{$product->available=='available' ? 'selected="selected" ' : '' }}> Availiable Now </option>
                </select>

                <select class="form-control mb-2" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                @endforeach    
                </select>


                <button type="submit" class="btn btn-success"> Add New Product </button>
            </form>
          </div>
         </div>
    </div>

    @endsection
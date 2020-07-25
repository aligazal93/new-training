@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-sm-12">


          <h4 class="text-center mb-10">Edit The Product</h4>
            <form action="{{url('/products/'.$product->id)}}" method="post"  enctype="multipart/form-data" >
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
                    <option value="0" {{$product->available =='0' ? 'selected="selected" ' : '' }}> Not Availiable </option>
                    <option value="1" {{$product->available=='1' ? 'selected="selected" ' : '' }}> Availiable Now </option>
                </select>

                <select class="form-control mb-2" name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{  $product->category_id==$category->id?  'selected="selected" ' : ''  }} > {{$category->name}} </option>
                @endforeach    
                </select>
                <input type="file" class="form-control mb-2" name='image' value="{{$product->image}}" >
                <img style="width:200px;display:block" src="{{ asset('uploads/products/'.$product->image ) }}" class="img-responsive img-thumbnil"  alt="">
                <button type="submit" class="btn btn-warning mb-2"> <i class='fa fa-pencil'></i> Edit Product </button>
            </form>
          </div>
         </div>
    </div>

    @endsection
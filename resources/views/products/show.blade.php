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

                <h4 class="text-center mb-10">Details of Product . {{$product->name}} </h4>
                
                <p> Product Name : <strong>  {{$product->name}} </strong> </p>
                <p> Product Description : <strong>  {{$product->details}} </strong> </p>
                <p> Product Price : <strong>  {{$product->price}} </strong> </p>
                <p> Product Count : <strong>  {{$product->count}} </strong> </p>
                <p> Product States : <strong> {!!$product->available ? '<span class="text-success"> Availiable </span>' : '<span class="text-danger"> Not available </span>' !!} </strong>  </p>
                <p>category : <strong>  {{$product->category->name}} </strong> </p>

                <p> user Name : <strong> {{ optional($product->user)->name }} </strong> </p>

          </div>
        </div>
    </div>


@endsection
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

          <h4 class="text-center mb-10">All  Product</h4>
          <a class="btn btn-primary mb-2" href="{{url('products.create')}}"> Add New Product </a>

            <table class="table table-bordered table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Count</th>
                <th scope="col">Availiable</th>
                <th scope="col"> Edit </th>
                <th scope="col"> Delete </th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row"> {{$product->id}} </th>
                    <td><a href="/products/{{$product->id}}"> {{$product->name}} </a></td>
                    <td>{{optional($product->category)->name}}</td>
                    <td>{{$product->details}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->count}}</td>
                    <td >{!!$product->available ? '<span class="text-success"> available </span>' : '<span class="text-danger"> Not available </span>' !!}</td>
                    <td><a href="/products/{{$product->id}}/edit"> Edit </a></td>
                    <td>                   
                      <form action="{{url('/products/'.$product->id)}}" method="POST">
                        @method('DELETE')
                          @csrf
                        <button type="submit" class="btn btn-danger">Delete Now</button>
                     </form>
                   </td>

                </tr>
                @endforeach    


            </tbody>
            </table>

          
          </div>
        </div>
    </div>


@endsection
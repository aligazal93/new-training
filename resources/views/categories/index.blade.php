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
                 <h3 class="text-center">  All Categories </h3>
         <a class="btn btn-primary mb-3" href="{{url('categories.create')}}">  Add New Category </a>


                 <table class="table table-bordered table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Edit Category</th>
                <th scope="col">Delete Category</th>

                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row"> {{$category->id}} </th>
                    <td>{{$category->name}}</td>
                    <td><a href="/categories/{{$category->id}}/edit"> Edit </a></td>
                    <td>                   
                      <form action="{{url('/categories/'.$category->id)}}" method="POST">
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
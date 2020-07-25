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
         <a class="btn btn-primary mb-3" href="{{url('categories.create')}}"><i class="fa fa-plus"></i>  Add New Category </a>


                 <table class="table table-bordered table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Image</th>
                <th scope="col">Edit Category</th>
                <th scope="col">Delete Category</th>

                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row"> {{$category->id}} </th>
                    <td>{{$category->name}}</td>
                    <td><img src="{{ asset('uploads/categories/'.$category->image) }}" alt="{{$category->name}}" style="width:50px;height:50px;border-raduis:150px"></td>

                    <td><a href="/categories/{{$category->id}}/edit"> <button class="btn btn-warning"><i class="fa fa-edit"></i> Edit Now </button>  </a></td>
                    <td>                   
                      <form action="{{url('/categories/'.$category->id)}}" method="POST">
                        @method('DELETE')
                          @csrf
                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete Now</button>
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
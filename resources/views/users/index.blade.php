@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
    <div class="col-sm-12">
         <h3 class="text-center">  All Users </h3>

         @if(session()-> has('message'))
                  <div class="alert alert-success">
                        {{ session() -> get('message') }}
                  </div>
            @endif

         <a class="btn btn-primary mb-3" href="{{url('users.create')}}"> <i class="fa fa-plus"></i>  Add New User </a>


         <table class="table table-bordered table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row"> {{$user->id}} </th>
                    <td>{{$user->name}}</td>
                    <td><img src="{{ asset('uploads/users/'.$user->image) }}" alt="{{$user->name}}" style="width:50px;height:50px;border-raduis:150px"></td>
                    <td>{{$user->email}}</td>
                    <td><a href="/users/{{$user->id}}/edit"> <button class="btn btn-warning"><i class="fa fa-edit"></i> Edit Now </button>  </a></td>
                    <td>                   
                      <form action="{{url('/users/'.$user->id)}}" method="POST">
                        @method('DELETE')
                          @csrf
                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i>  Delete Now</button>
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
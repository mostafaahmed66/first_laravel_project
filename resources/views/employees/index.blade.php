

@extends('layouts.app')

@section('content')

<!--<h3>welcome at emp page</h3>
<div class="container col-md-7">

    <table class=" table table-dark">


        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>salary</th>
            <th>dep_id</th>
        </tr>





    </table>
</div>
-->




<div class="container col-md-6">


    <div class="card card-body">


        <h4 class="">welcome at employee index

            <a class="btn btn-info float-end" href="{{route('employees.create')}}">Create Employee</a>


        </h4>

        @if(Session::has('done'))
        <div class="alert alert-success">
            {{Session::get('done')}}
            </div>

        @endif


        <table class="table table-dark">

              <tr>
                <th>#Num</th>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>salary</th>
            <th>dep_id</th>
            <th colspan="3">Actions</th>
        </tr>

        @foreach($employees as $employee)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->salary}}</td>
            <td>{{$employee->departs->name}}</td>

            <th><a  class="text-danger" href="{{route('employees.destroy',$employee->id)}}">Delete</a></th>
            <th><a class="text-info" href="{{route('employees.show',$employee->id)}}">show</a></th>
            <th><a class="text-secondary" href="{{route('employees.edit',$employee->id)}}">Edit</a></th>

            </tr>
            @endforeach

        </table>
        {{$employees->links('pagination::bootstrap-5')}}
    </div>
</div>



@endsection

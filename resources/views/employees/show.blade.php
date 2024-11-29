

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


        <h4 class="float-end">welcome at employee detailes
<br>
            <a  class="btn btn-info" href="{{route('employees.index')}}">Back</a>

        </h4>


        <table class="table table-dark">

              <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>salary</th>
            <th>dep_id</th>
        </tr>


        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->salary}}</td>
            <td>{{$employee->departs->name}}</td>
            </tr>

        </table>

    </div>
</div>



@endsection

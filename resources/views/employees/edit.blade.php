@extends('layouts.app')


@section('content')



<h2 class="text-center">Edit employee:{{$employee->id}}</h2>



<div class="container col-md-6">
    <form  method="POST" action="{{route('employees.update',$employee->id)}}">
        @csrf
    <div class="card">
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{$employee->name}}" class="form-control" id="name" name="name" placeholder="Enter your name" class=" form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email"  value="{{$employee->email}}" class="form-control" id="email" name="email" placeholder="Enter your email" class=" form-control">
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number"   value="{{$employee->salary}}" class="form-control" id="salary" name="salary" placeholder="enter your salary" class=" form-control">
                    </div>
                    <div class="form-group">
                        <label for="department" >Department</label>
                        <select name="depart" id="" class=" form-control">

                            @foreach ($departs as $item)
                            @if($item->id==$employee->dep_id)
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                            @else

                            <option value="{{$item->id}}">{{$item->name}}</option>

                            @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Update</button>


                    </div>
        </div>
    </div>
</form>
</div>







@endsection

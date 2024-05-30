<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>

@extends('layouts.app')
@section('content')

<div class="container">
<div class="alert alert-success alert-dismissible" role="alert">

@if(Session::has('message'))
{{ Session::get('message') }}
@endif

<button type="button" class="close" data-dismiss="alert" aria-label="Close"
    <span aria-hidden="true">&times;</span>
</button>
</div>

<a href="{{ url('employee/create') }}" class="btn btn-warning">New Employee</a>
<br>
<br>
    <table class="table table-light">

        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$employee->photo }}" width="100" alt="" style="border-radius: 50%;" class="img-thumbnail img">
                </td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>
                    <a href="{{ url('/employee/'.$employee->id.'/edit')}}" class="btn btn-primary">Edit</a>
                    | 
                    <form action="{{ url('/employee/'.$employee->id)}}" class="d-inline" method="post">
                        @csrf 
                        {{ method_field('DELETE')}}
                        <input type="submit" onclick="return confirm ('you want to delete?')" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    </div>
    @endsection
</body>
</html>
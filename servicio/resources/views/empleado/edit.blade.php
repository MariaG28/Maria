<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
@extends('layouts.app')
@section('content')

<div class="container">
<body>

   <form method="post" action="{{ url('/employee/'.$employee->id) }}" enctype="multipart/form-data">
   @csrf
   {{ method_field('PATCH') }}
   @include('empleado.form',['modo'=>'Edit'])
   </form>
    
   </div>
    @endsection
</body>
</html>
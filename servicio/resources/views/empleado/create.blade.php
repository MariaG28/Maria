<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
@extends('layouts.app')
@section('content')

<div class="container">
<body>

   <form method="post" action="{{ url('/employee') }}" enctype="multipart/form-data">
   @csrf
   @include('empleado.form',['modo'=>'Create'])
   </form>
    
   </div>
    @endsection
</body>
</html>
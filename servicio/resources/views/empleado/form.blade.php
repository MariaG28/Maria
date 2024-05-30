   <h1>{{ $modo }} Employee</h1>

   @if(count($errors)>0)
   <div class="alert alert-danger" role="alert">
      <ul>
         @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>  
         @endforeach
      </ul>
   </div>
   @endif

   <div class="form-group">
   <label for="first_name">Name:</label>
   <input type="text" class="form-control" name="first_name" value="{{ isset($employee->first_name)?$employee->first_name:old('first_name') }}" id="first_name">
   </div>

   <div class="form-group">
   <label for="last_name">Last Name:</label>
   <input type="text" class="form-control" name='last_name' value="{{ isset($employee->last_name)?$employee->last_name:old('last_name') }}" id='last_name'>
   </div>

   <div class="form-group">
   <label for="email">Email:</label>
   <input type="email" class="form-control" name='email' value="{{ isset($employee->email)?$employee->email:old('email') }}" id='email'>
   </div>

   <div class="form-group">
   <label for="photo"></label>
   @if(isset($employee->photo))
   <img class="img-thumbnail img" class="form-control" src="{{ asset('storage').'/'.$employee->photo }}" width="100" alt="">
   @endif
   <input type="file" name="photo" value="" id="photo">
   </div>
   <br>

   <input type="submit" class="btn btn-primary" value="{{ $modo }}">

   <a href="{{ url('employee/') }}" class="btn btn-danger">Cancel</a>
   <br>
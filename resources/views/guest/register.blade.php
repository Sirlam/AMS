@extends('layout.back.master')

@section('title')
AMS - Regsiter
@endsection

@section('body')

<div class="login-container">
	<div class="login-branding">
		<a href="index.html"><img src="images/logo.png" alt="Mouldifi" title="Mouldifi"></a>
	</div>
	<div class="login-content">
		<h2>Create an account</h2>
		@if (Session::has('success'))
				<span class="help-block text-primary"> {{ Session::get('success') }}</span>
    @elseif (Session::has('fail'))
				<span class="help-block text-danger"> {{ Session::get('fail') }}</span>
    @endif

		<form method="post" action="{{route('postRegister')}}" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="text" placeholder="Username" name="email" id="email" class="form-control">
				@if($errors->has('email'))
				    <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('email')}}</span>
				@endif
			</div>
			<div class="form-group">
				<input type="text" placeholder="Full Name" name="name" id="name" class="form-control">
				@if($errors->has('name'))
				    <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('name')}}</span>
				@endif
			</div>
			<div class="form-group">
				<label>Department</label>
				<select class="form-control" name="dept_id" id="dept_id">
					@foreach($departments as $item)
      			<option value="{{$item->id}}">{{$item->name}}</option>
    			@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="password" placeholder="Password" name="password" id="Password" class="form-control">
				@if($errors->has('password'))
				    <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('password')}}</span>
				@endif
			</div>
			<div class="form-group form-action">
				{{csrf_field()}}
				<button type="submit" class="btn btn-primary btn-block">Regsiter</button>
			</div>
			<p class="text-center">Have an account <a href="{{URL::route('login')}}">Sign in</a></p>
		</form>
	</div>
</div>
@stop

@extends('layout.back.master')

@section('title')
AMS - Login
@endsection

@section('body')
<div class="login-container">
	<div class="login-branding">
		<a href="#"><img src="images/logo.png" alt="AMS" title="AMS"></a>
	</div>
	<div class="login-content">
		<h2><strong>Welcome</strong>, please login</h2>
		@if (Session::has('success'))
				<span class="help-block text-primary"> {{ Session::get('success') }}</span>
    @elseif (Session::has('fail'))
				<span class="help-block text-danger"> {{ Session::get('fail') }}</span>
    @endif
		<form method="post" action="{{route('postLogin')}}" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="text" placeholder="Username" name="email" id="email" class="form-control">
				@if($errors->has('email'))
				    <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('email')}}</span>
				@endif
			</div>
			<div class="form-group">
				<input type="password" placeholder="Password" name="password" id="password" class="form-control">
				@if($errors->has('password'))
				    <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> {{$errors->first('password')}}</span>
				@endif
			</div>
			<div class="form-group">
				 <div class="checkbox checkbox-replace">
					<input type="checkbox" id="remeber" name="remeber">
					<label for="remeber">Remeber me</label>
				  </div>
			 </div>
			<div class="form-group">
				{{csrf_field()}}
				<button type="submit" class="btn btn-primary btn-block">Login</button>
			</div>
			<p class="text-center"><a href="#">Forgot your password?</a></p>
      <p class="text-center"><a href="{{URL::route('register')}}">Create Account</a></p>
		</form>
	</div>
</div>
@stop

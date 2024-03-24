@extends('layouts.website.layout4')
@section('content')
<div class="login-content">
	<form action="{{route('website.auth.register')}}" method="post">
		@csrf
		
		<img src="{{asset('img/mm/logo_main.png')}}">
		<h2 class="title">REGISTER</h2>
		   <div class="input-div one">
			  <div class="i">
					  <i class="fas fa-user"></i>
			  </div>
			  <div class="div">
					  <h5>Name</h5>
					  <input required maxlength="30" minlength="3" type="text" name="name" class="input" oninvalid="this.setCustomValidity('Please Enter Valid Name')" oninput="this.setCustomValidity('')">
			  </div>
		   </div>
		   <div class="input-div one">
			  <div class="i">
					  <i class="fas fa-user"></i>
			  </div>
			  <div class="div">
					  <h5>Email</h5>
					  <input required maxlength="30"  type="email" name="email"  class="input" oninvalid="this.setCustomValidity('Please Enter Valid Email')" oninput="this.setCustomValidity('')">
			  </div>
		   </div>
		   <div class="input-div pass">
			  <div class="i"> 
				   <i class="fas fa-lock"></i>
			  </div>
			  <div class="div">
				   <h5>Password</h5>
				   <input required minlength="8" maxlength="30" type="password" name="password" class="input" oninvalid="this.setCustomValidity('Please Enter Password')" oninput="this.setCustomValidity('')">
		   </div>
		</div>
		   <div class="input-div pass">
			  <div class="i"> 
				   <i class="fas fa-lock"></i>
			  </div>
			  <div class="div">
				   <h5>Confirm Password</h5>
				   <input required minlength="8"  maxlength="30" type="confirmpassword" name="password_confirmation" class="input" oninvalid="this.setCustomValidity('Please Enter Confirm Password')" oninput="this.setCustomValidity('')">
		   </div>
		</div>
		<a href="{{route('website.auth.login')}}">Already Registered Login Here -></a>
		@if ($errors->any())
		<div class="mt-3 p-3">
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	@endif
		<input type="submit" class="btn" value="Register">
	</form>
</div>
@endsection
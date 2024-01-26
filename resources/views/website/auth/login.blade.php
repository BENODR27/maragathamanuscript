@extends('layouts.website.layout4')
@section('content')
<div class="login-content">
	<form action="{{route('website.auth.login')}}" method="post">
		@csrf
		<img src="{{asset('img/mm/logo.png')}}">
		<h2 class="title">LOGIN</h2>
		   <div class="input-div one">
			  <div class="i">
					  <i class="fas fa-user"></i>
			  </div>
			  <div class="div">
					  <h5>Username</h5>
					  <input type="email" required name="email" class="input" oninvalid="this.setCustomValidity('Please Enter UserName')" oninput="this.setCustomValidity('')">
			  </div>
		   </div>
		   <div class="input-div pass">
			  <div class="i"> 
				   <i class="fas fa-lock"></i>
			  </div>
			  <div class="div">
				   <h5>Password</h5>
				   <input type="password" required name="password" class="input" oninvalid="this.setCustomValidity('Please Enter Password')" oninput="this.setCustomValidity('')">
		   </div>
		</div>
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
		<a href="{{route('website.auth.register')}}">New User Register Here -></a>
		
		<input type="submit" class="btn" value="Login">
	</form>
</div>
@endsection
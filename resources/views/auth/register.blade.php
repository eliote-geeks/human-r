@extends('layout.app')
@section('content')
<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<img class="img-fluid logo-dark mb-2" src="assets/img/logo.png" alt="Logo">
<div class="loginbox">
<div class="login-right">
<div class="login-right-wrap">
<h1>Register</h1>
<p class="account-subtitle">Access to our dashboard</p>
<div class="text-danger">
    <x-jet-validation-errors class="mb-4" />
</div>
<form action="{{route('register')}}" method="POST">
@csrf
<div class="form-group">
<label class="form-control-label">Name</label>
<input class="form-control" type="text" name="name">
</div>
<div class="form-group">
<label class="form-control-label">Email Address</label>
<input class="form-control" type="text" name="email">
</div>
<div class="form-group">
<label class="form-control-label">Password</label>
<input class="form-control" type="text" name="password">
</div>
<div class="form-group">
<label class="form-control-label">Confirm Password</label>
<input class="form-control" type="text" name="password_confirmation">
</div>
<div class="form-group mb-0">
<button class="btn btn-lg btn-block btn-primary" type="submit">Register</button>
</div>
</form>

<div class="login-or">
<span class="or-line"></span>
<span class="span-or">or</span>
</div>

<div class="social-login">
<span>Register with</span>
<a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
</div>

<div class="text-center dont-have">Already have an account? <a href="{{route('login')}}">Login</a></div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
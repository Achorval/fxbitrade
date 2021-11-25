@extends('landing.layouts.app')

@section('content')
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(../images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">Register</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="{{route('welcome')}}" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Register</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="py-50">
		<div class="container">
			<div class="row justify-content-center g-0">
				<div class="col-lg-5 col-md-5 col-12">
					<div class="box box-body">
						<div class="content-top-agile pb-0 pt-20">
							<h2 class="text-primary">Get started with Us</h2>
							<p class="mb-0">Register a New Membership</p>							
						</div>
						<form class="registerForm" action="{{ route('register') }}">
							@csrf
							<div class="p-10">
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
										<input type="text" name="name" id="name" class="form-control ps-15 bg-transparent" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Full Name">
									</div>
									<span class="invalid-feedback animated fadeInUp name-feedback" style="display: block;"></span>
								</div>
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
										<input type="text" name="username" id="username" class="form-control ps-15 bg-transparent" value="{{ old('username') }}" autocomplete="username" autofocus placeholder="User Name">
									</div>
									<span class="invalid-feedback animated fadeInUp username-feedback" style="display: block;"></span>
								</div>
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
										<input type="email" name="email" id="email" class="form-control ps-15 bg-transparent" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
									</div>
									<span class="invalid-feedback animated fadeInUp email-feedback" style="display: block;"></span>
								</div>
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
										<input type="password" id="password" class="form-control ps-15 bg-transparent" name="password" autocomplete="new-password" placeholder="Password">
									</div>
									<span class="invalid-feedback animated fadeInUp password-feedback" style="display: block;"></span>
								</div>
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
										<input type="password" id="password-confirm" class="form-control ps-15 bg-transparent" name="password_confirmation" autocomplete="new-password" placeholder="Retype Password">
									</div>
									<span class="invalid-feedback animated fadeInUp password_confirmation-feedback" style="display: block;"></span>
								</div>
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
										<input type="text" name="referrer" id="referrer" class="form-control ps-15 bg-transparent" value="{{ old('referrer') }}" autocomplete="referrer" autofocus placeholder="Referrer (Optional)">
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="checkbox ms-5">
										  <input type="checkbox" id="terms">
										  <label for="terms" class="form-label">I agree to the <a href="#" class="text-warning"><b>Terms</b></a></label>
										</div>
									</div>
									<div class="col-12 text-center">
										<button type="submit" class="waves-effect waves-light btn btn-info my-10 d-block w-p100 d-flex align-items-center justify-content-center">{{ __('Register') }}</button>
									</div>
								</div>
								<div class="text-center">
									<p class="mt-15 mb-0">Already have an account?<a href="{{ route('login') }}" class="text-danger ms-5"> Log In</a></p>
								</div>
							</form>				
						</div>
					</div>		
				</div>
			</div>
		</div>
	</section>		
@endsection()

@extends('landing.layouts.app')

@section('content')
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(../images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">Login</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="{{route('welcome')}}" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Login</li>
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
							<h2 class="text-primary">Let's Get Started</h2>
							<p class="mb-0">Sign in to continue to CryptoCurrency.</p>							
						</div>
						<div class="p-10">
							<form class="loginForm" action="{{ route('login') }}">
								@csrf
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
										<input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control ps-15 bg-transparent" placeholder="Username" autocomplete="email" autofocus>
									</div>
									<span class="invalid-feedback animated fadeInUp email-feedback" style="display: block;"></span>
								</div>
								<div class="form-group">
									<div class="input-group mb-15">
										<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
										<input type="password" name="password" id="password" class="form-control ps-15 bg-transparent" placeholder="Password" autocomplete="current-password">
									</div>
									<span class="invalid-feedback animated fadeInUp password-feedback" style="display: block;"></span>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="checkbox ms-5">
											<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
											<label for="remember" class="form-label">
												{{ __('Remember Me') }}
											</label>
										</div>
									</div>
									@if (Route::has('password.request'))
									<div class="col-6">
										<div class="fog-pwd text-end">
											<a href="{{ route('password.request') }}" class="hover-warning">
												<i class="ion ion-locked"></i> 
												{{ __('Forgot Your Password?') }}
											</a>
											<br>
										</div>
									</div>
									@endif
									<div class="col-12 text-center">
										<button type="submit" class="waves-effect waves-light btn btn-info my-15 d-block w-p100 d-flex align-items-center justify-content-center">
											{{ __('Login') }} 
										</button>
									</div>
								</div>
							</form>	
							@if (Route::has('register'))
							<div class="text-center">
								<p class="mt-15 mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-warning ms-5">{{ __('Register') }}</a></p>
							</div>	
                            @endif
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section>	
@endsection()

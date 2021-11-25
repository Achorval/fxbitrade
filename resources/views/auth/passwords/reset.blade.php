@extends('landing.layouts.app')

@section('content')

<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url({{asset('images/front-end-img/background/bg-8.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center">						
                    <h2 class="page-title text-white">Reset Password</h2>
                    <ol class="breadcrumb bg-transparent justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('welcome')}}" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Reset Password</li>
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
                <div class="box box-body mb-0">
                    <div class="content-top-agile pb-0 pt-20">
                        <h2 class="text-primary">{{ __('Reset Password') }}</h2>					
                    </div>
                    <div class="p-10">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            
                            <div class="form-group">
                                <div class="input-group mb-15">
                                    <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                    <input type="email" class="form-control ps-15 bg-transparent" name="email" id="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus placeholder="Your Email">
                                </div>

                                @error('email')
                                <span class="invalid-feedback animated fadeInUp email-feedback" style="display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-15">
                                    <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                    <input type="password" class="form-control ps-15 bg-transparent" name="password" id="password" autocomplete="new-password" placeholder="New Password">
                                </div>

                                @error('password')
                                <span class="invalid-feedback animated fadeInUp password-feedback" style="display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-15">
                                    <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
                                    <input type="password" class="form-control ps-15 bg-transparent" name="password_confirmation" id="password-confirm" autocomplete="new-password" placeholder="Password Confirm">
                                </div>
                                <span class="invalid-feedback animated fadeInUp password-confirm-feedback" style="display: block;"></span>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-12 text-center">
                                    <button type="submit" class="waves-effect waves-light btn btn-info mt-15 d-block w-p100 d-flex align-items-center justify-content-center">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>		
                    </div>
                </div>		
            </div>
        </div>
    </div>
</section>

@endsection 
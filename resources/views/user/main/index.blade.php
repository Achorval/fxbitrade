@extends('user.layouts.app')

@section('content')

@include('user.layouts.sidebar')

<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <h3>Hello, {{ Auth::user()->username }}</h3>
            <p class="mb-0">Welcome to Fxbitrade Investment Dashboard</p>
        </div>
        <section class="content">
            @if(Session::get('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::get('fail'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @if (!$user->email_verified_at)
            <div class="callout callout-info">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center mr-2">
                        <div class="alert-left-icon-big mr-2">
                            <i class="mdi mdi-email-alert"></i>
                        </div>
                        <p>Please confirm your email address: {{$user->email}}</p>
                    </div>
                    <button class="btn btn-primary btn-sm resendEmail" data-id="{{$user->id}}">
                        Resend Email
                    </button>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-stat box box-body box-primary bg-hexagons-dark pull-up">
                        <div class="media d-flex align-items-center px-0">
                            <span class="mr-3">
                                <i class="fa fa-credit-card"></i>
                            </span>
                            <div class="media-body text-right text-white">
                                <p class="no-margin">Capital</p>
                                <h3 class="no-margin text-bold">${{$capital}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-stat box box-body box-success bg-hexagons-dark pull-up">
                        <div class="media d-flex align-items-center px-0">
                            <span class="mr-3">
                                <i class="fa fa-university"></i>
                            </span>
                            <div class="media-body text-right text-white">
                                <p class="no-margin">Balance</p>
                                <h3 class="no-margin text-bold">${{$balance->current}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-stat box box-body box-warning bg-hexagons-dark pull-up">
                        <div class="media d-flex align-items-center px-0">
                            <span class="mr-3">
                                <i class="fa fa-money"></i>
                            </span>
                            <div class="media-body text-right text-white">
                                <p class="no-margin">Profit Earned</p>
                                <h3 class="no-margin text-bold">${{$earning + $bonus}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-stat box box-body box-info bg-hexagons-dark pull-up">
                        <div class="media d-flex align-items-center px-0 px-0">
                            <span class="mr-3">
                                <i class="fa fa-gift"></i>
                            </span>
                            <div class="media-body text-right text-white">
                                <p class="no-margin">Referral Commission</p>
                                <h3 class="no-margin text-bold">${{$referral}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
					<div class="box">
						<div class="box-header with-border">
                            <h4 class="box-title">Personal Details</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="emailAddress1">Referral Code :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{Auth::user()->username}}" id="referral" readonly> 
                                        <span class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="button" onclick="copy('referral', 'Referral Code')">Copy Now!</button>
                                        </span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
            </div>
        </section>	  
    </div>
</div>

@endsection()
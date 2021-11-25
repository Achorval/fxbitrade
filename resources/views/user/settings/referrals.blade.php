@extends('user.layouts.app')

@section('content')

@include('user.layouts.sidebar')

<div class="content-wrapper">
  <div class="container-full">
    <div class="content-header">
      <h3>Referrals</h3>
    </div>
    <section class="content">
      <div class="row">
        @include('user.layouts.account')
        <div class="col-xl-8 col-lg-7">
          <div class="box box-solid box-dark">
            <div class="box-header with-border">
              <h3 class="box-title">Referral Details</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xl-6 col-12">
                  <div class="box-inverse box-primary pull-up bg-hexagons-dark rounded p-3 mb-4">
                    <div class="text-center">
                      <h3 class="text-white mb-10">Referral Comission</h3>
                      <h2 class="font-light text-white">${{count($referrals)}}</h2>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6 col-12">
                  <div class="box-inverse box-primary pull-up bg-hexagons-dark rounded p-3 mb-4">
                    <div class="text-center">
                      <h3 class="text-white mb-10">Number of referrals</h3>
                      <h2 class="font-light text-white">{{$commission}}</h2>
                    </div>
                  </div>
                </div>      
              </div>
              <div class="form-group">
                <div class="controls">
                  <label for="emailAddress1">Referral Code :</label>
                  <div class="input-group">
                    <input type="text" class="form-control" value="{{$user->username}}" id="referral" readonly> 
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
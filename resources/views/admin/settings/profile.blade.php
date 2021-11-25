@extends('admin.layouts.app')

@section('content')

@include('admin.layouts.sidebar')

<div class="content-wrapper">
  <div class="container-full">
    <div class="content-header">
        <h3>Settings</h3>
    </div>
    <section class="content">
      <div class="row">
        @include('admin.layouts.account')
        <div class="col-xl-8 col-lg-7">
					<div class="box">
						<div class="box-header with-border">
              <h4 class="box-title">Personal Details</h4>
						</div>
            <div class="box-body">
              <form 
                class="profileForm" 
                action="{{ route('adminUpdateProfile') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Name">Name :</label>
                            <input type="text" name="name" class="form-control" value="{{$admin->name}}" placeholder="Name">
                            <span class="invalid-feedback animated fadeInUp name-feedback" style="display: block;">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="text" name="email" class="form-control" value="{{$admin->email}}" readonly placeholder="Email"> 
                            <span class="invalid-feedback animated fadeInUp email-feedback" style="display: block;">
                            </span>
                        </div>    
                    </div>
                </div>
                <div class="form-group mt-3">
                  <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">Update</button>  
                </div>
              </form>               
            </div>
          </div>
          <div class="box">
						<div class="box-header with-border">
              <h4 class="box-title">Referral Settings</h4>
						</div>
            <div class="box-body">
              <form class="referralSettingsForm" action="{{ route('updateReferralSettings') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name :</label>
                            <input type="text" name="name" class="form-control" value="{{$referral->name}}" placeholder="Name">
                            <span class="invalid-feedback animated fadeInUp name-feedback" style="display: block;">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="percent">Percent :</label>
                          <input type="text" name="percent" class="form-control" value="{{$referral->percent}}" placeholder="Percent">
                          <span class="invalid-feedback animated fadeInUp percent-feedback" style="display: block;">
                          </span>
                      </div>
                  </div>
              </div>
                <div class="form-group mt-3">
                  <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center referral-btn">Update</button>  
                </div>
              </form>               
            </div>
          </div>
				</div>
      </div>
    </section>
  </div>
</div>

@endsection()
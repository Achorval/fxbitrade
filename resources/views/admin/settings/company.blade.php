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
                            <h4 class="box-title">Company Information</h4>
						</div>
                        
                        <div class="box-body">
                            <form class="companyForm" action="{{ route('adminUpdateCompany') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="emailAddress1">Name :</label>
                                            <input type="text" name="name" class="form-control" value="{{$company->name}}" placeholder="Name">
                                            <span class="invalid-feedback animated fadeInUp name-feedback" style="display: block;">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="addressline1">Website :</label>
                                            <input type="text" name="website" class="form-control" value="{{$company->url}}" placeholder="website"> 
                                            <span class="invalid-feedback animated fadeInUp website-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address :</label>
                                            <input type="text" name="address" class="form-control" value="{{$company->address}}" placeholder="Address"> 
                                            <span class="invalid-feedback animated fadeInUp address-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="percent">Email :</label>
                                            <input type="text" name="email" class="form-control" value="{{$company->email}}" placeholder="Email"> 
                                            <span class="invalid-feedback animated fadeInUp email-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="percent">Phone Number :</label>
                                            <input type="text" name="phone" class="form-control" value="{{$company->phone}}" placeholder="phone"> 
                                            <span class="invalid-feedback animated fadeInUp phone-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <h4 class="box-title mb-15">Social Media</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="facebook">Facebook :</label>
                                            <input type="text" name="facebook" class="form-control" value="{{$company->facebook}}" placeholder="facebook"> 
                                            <span class="invalid-feedback animated fadeInUp facebook-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="twitter">Twitter :</label>
                                            <input type="text" name="twitter" class="form-control" value="{{$company->twitter}}" placeholder="Twitter"> 
                                            <span class="invalid-feedback animated fadeInUp twitter-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="instagram">Instagram :</label>
                                            <input type="text" name="instagram" class="form-control" value="{{$company->instagram}}" placeholder="Instagram"> 
                                            <span class="invalid-feedback animated fadeInUp instagram-feedback" style="display: block;">
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
				</div>
            </div>
        </section>
    </div>
</div>
@endsection()
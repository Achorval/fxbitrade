@extends('user.layouts.app')

@section('content')

@include('user.layouts.sidebar')

<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <h3>Change Password</h3>
        </div>
        <section class="content">
            <div class="row">
                @include('user.layouts.account')
                <div class="col-xl-8 col-lg-7">
                    <div class="box box-solid box-dark">
                        <div class="box-header with-border">
                            <h3 class="box-title">Change Password</h3>
                        </div>
                        <div class="box-body">
                            <form class="changePasswordForm" action="{{ route('changePasswordUpdate') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Current Password">Current Password :</label>
                                            <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Current Password">
                                            <span class="invalid-feedback animated fadeInUp current_password_feedback" style="display: block;">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="New Password">New Password :</label>
                                            <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password"> 
                                            <span class="invalid-feedback animated fadeInUp new_password_feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="Confirm New Password">Confirm New Password :</label>
                                            <input type="password" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password"> 
                                            <span class="invalid-feedback animated fadeInUp confirm_new_password_feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">
                                        Submit
                                    </button>
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
@extends('user.layouts.app')

@section('content')

@include('user.layouts.sidebar')

<div class="content-wrapper">
    <div class="container-full">
      <div class="content-header">
            <h3>Settings</h3>
        </div>
        <section class="content">
            <div class="row">
                @include('user.layouts.account')
                <div class="col-xl-8 col-lg-7">
                    <div class="box box-solid box-dark">
                        <div class="box-header with-border">
                            <h3 class="box-title">Personal Details</h3>
                        </div>
                        <div class="box-body">
                            <form class="profileForm" action="{{ route('updateUserProfile') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="emailAddress1">Name :</label>
                                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" placeholder="Name">
                                            <span class="invalid-feedback animated fadeInUp name-feedback" style="display: block;">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="addressline1">Email :</label>
                                            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" readonly placeholder="Email"> 
                                            <span class="invalid-feedback animated fadeInUp email-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">
                                        Update
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
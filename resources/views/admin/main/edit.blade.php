@extends('admin.layouts.app')

@section('content')

@include('admin.layouts.sidebar')

<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <h3>Users</h3>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="box box-solid box-dark">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Member Account:</h3>
                        </div>
                        <div class="box-body">
                            <form class="updateUser" method="post" action="{{ route('updateUser', ['id'=>$user->id]) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Full Name :</label>
                                            <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Name">
                                            <span class="invalid-feedback animated fadeInUp name-feedback" style="display: block;">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="username">Username :</label>
                                            <input type="text" name="username" class="form-control" value="{{$user->username}}" placeholder="Username"> 
                                            <span class="invalid-feedback animated fadeInUp username-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email :</label>
                                            <input type="text" name="email" class="form-control" value="{{$user->email}}" placeholder="Email"> 
                                            <span class="invalid-feedback animated fadeInUp email-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">Status :</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Select Status...</option>
                                                <option value="active">Active</option>
                                                <option value="disable">Disable</option>
                                                <option value="suspended">Suspended</option>
                                            </select>  
                                            <span class="invalid-feedback animated fadeInUp status-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="support">Admin Passphrase :</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password"> 
                                            <span class="invalid-feedback animated fadeInUp password-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">Save Changes</button>
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
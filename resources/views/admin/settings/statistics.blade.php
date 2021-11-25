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
                            <h4 class="box-title">Statistics Information</h4>
						</div>
                        
                        <div class="box-body">
                            <form class="statisticsForm" action="{{ route('updateStatistics') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="transactions">Transactions :</label>
                                            <input type="number" name="transactions" class="form-control" value="{{$statistics->transactions}}" placeholder="Transactions">
                                            <span class="invalid-feedback animated fadeInUp transactions-feedback" style="display: block;">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="countries">Countries :</label>
                                            <input type="number" name="countries" class="form-control" value="{{$statistics->countries}}" placeholder="Countries"> 
                                            <span class="invalid-feedback animated fadeInUp countries-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="investors">Investors :</label>
                                            <input type="number" name="investors" class="form-control" value="{{$statistics->investors}}" placeholder="Investors"> 
                                            <span class="invalid-feedback animated fadeInUp investors-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="feedbacks">Feedbacks :</label>
                                            <input type="number" name="feedbacks" class="form-control" value="{{$statistics->feedbacks}}" placeholder="Feedbacks"> 
                                            <span class="invalid-feedback animated fadeInUp feedbacks-feedback" style="display: block;">
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
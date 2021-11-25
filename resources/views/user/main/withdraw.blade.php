@extends('user.layouts.app')

@section('content')

@include('user.layouts.sidebar')

<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <h3>Withdraw</h3>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="box box-solid box-dark">
                        <div class="box-header with-border">
                            <h3 class="box-title">Request Withdrawal</h3>
                        </div>
                        <div class="box-body p-4">
                            <form class="withdrawForm" action="{{ route('withdrawalRequest') }}">
                                @csrf
                                <div class="bg-primary pull-up rounded p-3 mb-4">
                                    <div class="text-center">
                                        <h3 class="text-white mb-10">Account Balance:</h3>
                                        <p class="font-light text-white d-flex justify-content-center">${{$balance->current}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="lastName1">Select Method :</label>
                                            <select name="currency" id="currency" class="form-control" aria-invalid="false">
                                                <option value="">Select Method</option>
                                                @foreach ($currencies as $currency)
                                                    <option value="{{$currency->id}}">
                                                        {{$currency->name}}
                                                    </option> 
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback animated fadeInUp currency-feedback" style="display: block;">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="emailAddress1">Wallet Address :</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Address"> 
                                            <span class="invalid-feedback animated fadeInUp address-feedback" style="display: block;">
                                            </span>
                                            <small class="text-primary">Enter your correct wallet address in the above</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="addressline1">Amount :</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount"> 
                                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-dollar"></i></span> 
                                            </div>
                                            <span class="invalid-feedback animated fadeInUp amount-feedback" style="display: block;">
                                            </span>
                                        </div>    
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">Withdraw</button>
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
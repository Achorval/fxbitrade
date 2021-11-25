@extends('user.layouts.app')

@section('content')

@include('user.layouts.sidebar')

<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <h3>Mode Of Deposit</h3>
            <p class="mb-0 fs-13">You have selected the <strong>{{$plan->name}}:</strong> ${{$plan->minimum}} - ${{$plan->maximum}}</p>
        </div>
        <section class="content">
            <div class="row">
                @if (!empty($currencies))
                @foreach ($currencies as $currency)
                <div class="col-lg-3">
                    <div class="box">
                        <div class="box-body text-center">
                            <h1>{{$currency->name}}</h1>
                            <br>
                            <div class="ml-auto mb-3 mr-auto d-block">
                                <?= $currency->image ?>                                  
                            </div>
                            <br>
                            <button class="btn btn-rounded btn-warning fetchCurrency" data-id="{{$currency->id}}">
                                Select plan
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-lg-12">
                    <div class="box">
                      <div class="box-body text-center text-primary"><svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg><h4 class="my-2">You don’t have mode of payments yet</h4></div>
                    </div>
                </div>
                @endif
            </div>
      </section>	  
    </div>
</div>

<div class="modal center-modal fade" id="depositModal" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="box box-solid box-inverse box-dark mb-0">
                <div class="box-header with-border">
                    <h3 class="box-title">Deposit Fund</h3>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="box-body">
                    <form class="createDepositForm" action="{{ route('createDeposit') }}">
                        @csrf
                        <input type="hidden" value="{{$plan->id}}" name="plan" id="plan" class="form-control"> 
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="currency">Currency :</label>
                                    <div class="input-group"> 
                                        <span class="input-group-addon image">
                                            <div id="image" style="width: 24px;height:24px"></div>
                                        </span>
                                        <input type="text" id="currency" readonly class="form-control"> 
                                        <input type="hidden" name="currency" id="currency_id" readonly class="form-control"> 
                                    </div>
                                    <span class="invalid-feedback animated fadeInUp currency-feedback" style="display: block;">
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user">From :</label>
                                    <input type="text" class="form-control" readonly id="username"> 
                                    <input type="hidden" class="form-control" readonly name="user" id="user_id"> 
                                    <span class="invalid-feedback animated fadeInUp user-feedback" style="display: block;">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">To :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="address" id="address" readonly placeholder="Search"> 
                                        <span class="input-group-append">
                                            <button class="btn btn-primary btn-sm" onclick="copy('address', 'Wallet Address')" type="button">Copy Now!</button>
                                        </span> 
                                    </div>
                                    <span class="invalid-feedback animated fadeInUp address-feedback" style="display: block;">
                                    </span>
                                    <small class="text-primary">Send your Bitcoin  to the wallet address above</small>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto" style="max-width: 200px">
                            <img src="{{asset('images/qrcode.png')}}" alt="codeQR">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="addressline1">Amount :</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount"> 
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-dollar"></i></span> 
                                    </div>
                                    <span class="invalid-feedback animated fadeInUp amount-feedback" style="display: block;">
                                    </span>
                                </div>    
                            </div>
                        </div>
                        <div class="form-group mt-10">
                            <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">Save Transaction</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection()
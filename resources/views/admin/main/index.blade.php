@extends('admin.layouts.app')

@section('content')

@include('admin.layouts.sidebar')

<div class="content-wrapper">
  <div class="container-full">
    <div class="content-header">
      <h3>Hello, {{ Auth::user()->username }}</h3>
      <p class="mb-0">Welcome to Crypto Invest Admin Dashboard</p>
    </div>
    <section class="content">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
          <div class="widget-stat box box-body box-danger bg-hexagons-dark pull-up">
            <div class="media d-flex align-items-center px-0">
              <span class="mr-3">
                <i class="fa fa-group"></i>
              </span>
              <div class="media-body text-right text-white">
                <p class="no-margin">Users</p>
                <h3 class="no-margin">{{count($users)}}</h3>
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
                <p class="no-margin">Total System Earning</p>
                <h3 class="no-margin">${{$totalEarning}}</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="widget-stat box box-body box-info bg-hexagons-dark pull-up">
            <div class="media d-flex align-items-center px-0">
              <span class="mr-3">
                <i class="glyphicon glyphicon-save"></i>
              </span>
              <div class="media-body text-right text-white">
                <p class="no-margin">Total Withdrawals</p>
                <h3 class="no-margin">${{$totalWithdrawal}}</h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="widget-stat box box-body box-primary bg-hexagons-dark pull-up">
            <div class="media d-flex align-items-center px-0">
              <span class="mr-3">
                <i class="fa fa-gift"></i>
              </span>
              <div class="media-body text-right text-white">
                <p class="no-margin">Total Referral Commission</p>
                <h3 class="no-margin">${{$referralCommission}}</h3>
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
              <!-- TradingView Widget BEGIN -->
              <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                {
                    "width": "100%",
                    "height": "490",
                    "defaultColumn": "overview",
                    "screener_type": "crypto_mkt",
                    "displayCurrency": "USD",
                    "colorTheme": "light",
                    "locale": "en",
                    "isTransparent": false
                }
                </script>
              </div>
              <!-- TradingView Widget END -->                 
            </div>
          </div>
        </div>
      </div>
    </section>        
  </div>
</div>

@endsection()
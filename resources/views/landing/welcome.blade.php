@extends('landing.layouts.app')

@section('content')

<section class="bg-img pt-200 pb-120" data-overlay="7" style="background-image: url(../images/front-end-img/banners/banner-1.jpg); background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-80">
                    <h2 class="box-title text-white fs-30 mb-20">Earn Effortlessly with</h2>
                    <h3 class="text-white fs-30 mb-30">our AI Trading System</h3>
                    <p class="text-white mb-30" style="max-width: 560px;">We believe in the efficiency of automated trading and we are geared to help our client enjoyits benefits and mitigate volatility risks in the crypto space.</p>	
                </div>
                <div class="gap-5">
                    <a href="{{route('register')}}" class="btn btn-outline btn-primary text-white" style="margin-right: 10px">Get Started</a>
                    <a href="{{route('login')}}" class="btn btn-primary ml-2">Login Now</a>
                </div>
            </div>
        </div>
    </div>
</section>	
<section class="overflow-xh" data-aos="fade-up">		
    <div class="row">
        <div class="col-12">
            <div class="box">
              <div class="box-body">
                  <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                      <div class="tradingview-widget-container__widget"></div>
                      <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                      {
                      "symbols": [
                        {
                          "proName": "BITSTAMP:BTCUSD",
                          "title": "BTC/USD"
                        },
                        {
                          "proName": "BITSTAMP:ETHUSD",
                          "title": "ETH/USD"
                        },
                        {
                          "description": "BTC/USD",
                          "proName": "BITBAY:BTCUSD"
                        },
                        {
                          "description": "XRP/USD",
                          "proName": "BITSTAMP:XRPUSD"
                        },
                        {
                          "description": "LTC/USD",
                          "proName": "BINANCE:LTCUSDT"
                        }
                      ],
                      "showSymbolLogo": true,
                      "colorTheme": "light",
                      "isTransparent": true,
                      "displayMode": "adaptive",
                      "locale": "in"
                    }
                      </script>
                    </div>
                    <!-- TradingView Widget END -->
              </div>
          </div>
        </div>
    </div>
</section>

<section class="py-50 overflow-xh" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12">
                <h1 class="mb-15">What We Offer</h1>					
                <hr class="w-100 bg-primary ms-0">
                <p>Mobility Markets</p>
                <div class="py-15">
                    <p class="fs-18 mb-20">Our high performance, AI driven trading strategies and bots were developed to assist both novice and professional digital asset investors take advantage of the ever growing crypto market for the purpose of wealth creation, financial stability, and residual income. These can be done from the comfort of your computer or mobile phone hassle free, with or without subtle knowledge of the crypto market.</p>								
                    <div class="text-center d-flex gap-3 justify-content-start">
                        <a href="https://www.youtube.com/watch?v=Um63OQz3bjo" class="popup-youtube btn btn-outline btn-warning"> <i class="fa fa-youtube-play me-10"></i>Watch the tutorial</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 position-relative">
                <div class="popup-vdo mt-30 mt-md-0">
                    <img src="../images/front-end-img/courses/4f.jpg" class="img-fluid rounded" alt="">
                    <a href="https://www.youtube.com/watch?v=Um63OQz3bjo" class="popup-youtube play-vdo-bt waves-effect waves-circle btn btn-circle btn-primary btn-lg"><i class="mdi mdi-play"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-50" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-12 text-center">
                <h1 class="mb-15">Our Distinctive Features</h1>	
                <p>Customer value chain</p>				
                <hr class="w-100 bg-primary">
            </div>
        </div>
        <div class="row mt-30">
            <div class="col-lg-6 col-12">
                <div class="mb-md-0">
                    <img class="img-responsive" src="images/gallery/cryptocurrency.jpeg" alt="" style="height: 750px; width: 90%;">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="mb-md-0">
                    <div class="">
                        <h2 class="box-title mb-0">The evolving <strong>Crypto Market</strong> requires a more diversified and smarter approach, <strong>make that happen!</strong></h2>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="box pull-up">
                                <div class="box-body">
                                    <div class="me-15 features">
                                        <i class="ti-reload"></i>
                                    </div>
                                    <h4 class="fw-500 text-dark my-10 fs-16">
                                        Hands Free System
                                    </h4>
                                    <p class="min-h-120">We are designed for convenience, thus helping you analyse the market and execute trades conservatively without hassles.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="box pull-up">
                                <div class="box-body">
                                    <div class="me-15 features">
                                        <i class="fa fa-university"></i>
                                    </div>
                                    <h4 class="fw-500 text-dark my-10 fs-16">
                                        Substantial ROI
                                    </h4>
                                    <p class="min-h-120">Our Alpha & Beta bots can boast of a minumum of 8 - 10% of invested capital weekly, outstanding results from our AI trading strategy.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="box pull-up">
                                <div class="box-body">
                                    <div class="me-15 features">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                    <h4 class="fw-500 text-dark my-10 fs-16">
                                        Fund Protection
                                    </h4>
                                    <p class="min-h-120">Stop loss and take profit orders will help secure your investment. The system will automatically execute trades to release gains.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6">
                            <div class="box pull-up">
                                <div class="box-body">
                                    <div class="me-15 features">
                                        <i class="fa fa-phone-square"></i>
                                    </div>
                                    <h4 class="fw-500 text-dark my-10 fs-16">
                                        Reliable Support Service
                                    </h4>
                                    <p class="min-h-120">Our client support service is 24x5 available for your queries and to provide assistance. Reach out anytime, We would be glad to attend to you.</p>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>						
    </div>
</section>

<section class="py-50 bg-white" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-12 text-center">
                <h1 class="mb-15">Market Live</h1>					
                <hr class="w-100 bg-primary">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="box box-body">
                    <div style="height:433px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px; width: 100%;"><div style="height:413px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div>
                </div>
            </div>
        </div>						
    </div>
</section>

<section class="pt-30 pb-50" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-12">  
                <div class="px-15 pt-15">
                    <div class="row">
                        <div class="col-12 col-md-4">
                        <div class="box box-body pull-up">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                {
                                "symbol": "BITSTAMP:BTCUSD",
                                "width": "100%",
                                "height": "100%",
                                "locale": "in",
                                "dateRange": "12M",
                                "colorTheme": "light",
                                "trendLineColor": "rgba(246, 178, 107, 1)",
                                "underLineColor": "rgba(255, 242, 204, 1)",
                                "isTransparent": true,
                                "autosize": true,
                                "largeChartUrl": ""
                            }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>			
                        </div>
                        <div class="col-12 col-md-4">
                        <div class="box box-body pull-up">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                {
                                "symbol": "BITSTAMP:ETHUSD",
                                "width": "100%",
                                "height": "100%",
                                "locale": "in",
                                "dateRange": "12M",
                                "colorTheme": "light",
                                "trendLineColor": "rgba(246, 178, 107, 1)",
                                "underLineColor": "rgba(255, 242, 204, 1)",
                                "isTransparent": true,
                                "autosize": true,
                                "largeChartUrl": ""
                            }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>			
                        </div>
                        <div class="col-12 col-md-4">
                        <div class="box box-body pull-up">
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                                {
                                "symbol": "BINANCE:XRPUSDT",
                                "width": "100%",
                                "height": "100%",
                                "locale": "in",
                                "dateRange": "12M",
                                "colorTheme": "light",
                                "trendLineColor": "rgba(246, 178, 107, 1)",
                                "underLineColor": "rgba(255, 242, 204, 1)",
                                "isTransparent": true,
                                "autosize": true,
                                "largeChartUrl": ""
                            }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                        </div>			
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-12 text-center">
                <h2 class="text-uppercase mb-15 fw-600">Our Investment Plans<br> <span class="fw-400 fs-24"> Choose the best</span></h2>
                <p>FxBitrade Investment Limited is a sustainable and progressive investment platform striving to utilize 99% profit making opportunities to improve clients financial status.</p>
            </div>
        </div>
        <div class="row mt-30">
            @foreach ($plans as $plan)
            <div class="col-lg-3">
                <div class="box">
                    <div class="box-body text-center">
                        <h3 class="price">
                            {{$plan->percent}}%
                            <span>{{$plan->duration}}</span>
                        </h3>
                        <h5 class="text-uppercase text-muted">
                            {{$plan->name}}
                        </h5>
                        <hr>
                        <p><strong>Minimum</strong> {{$plan->minimum}}</p>
                        <p><strong>Maximum</strong> {{$plan->maximum}}</p>
                        <p><strong>Support</strong> {{$plan->support}}</p>
                        <p><strong>Referral Bonus</strong> {{$commission->percent}}%</p>
                        <p><strong>Withdrawal after</strong> {{$plan->duration}}</p>

                        <br><br>
                        <a class="btn btn-rounded btn-{{$plan->color}}" href="#">Select plan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-30 bg-img countnm-bx" data-jarallax='{"speed": 0.4}' style="background-image: url(../images/front-end-img/background/bg-1.jpg)" data-overlay="5">
    <div class="container">			
        <div class="box box-body bg-transparent mb-0">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="text-center mb-30 mb-lg-0">
                        <div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
                            <span class="text-white fs-40 icon-User"><span class="path1"></span><span class="path2"></span></span>
                        </div>
                        <h1 class="my-10 text-white">$<span class="countnm">{{$statistics->transactions}}</span>M+</h1>
                        <div class="text-uppercase text-white">TRANSACTIONS</div>
                    </div>
                </div>	
                <div class="col-lg-3 col-6">
                    <div class="text-center mb-30 mb-lg-0">
                        <div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
                            <span class="text-white fs-40 icon-Book"></span>
                        </div>
                        <h1 class="countnm my-10 text-white">{{$statistics->countries}}</h1>
                        <div class="text-uppercase text-white">COUNTRIES</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="text-center">
                        <div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
                            <span class="text-white fs-40 icon-Group"><span class="path1"></span><span class="path2"></span></span>
                        </div>
                        <h1 class="countnm my-10 text-white">{{$statistics->investors}}</h1>
                        <div class="text-uppercase text-white">ACTIVE INVESTORS</div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="text-center">
                        <div class="w-80 h-80 l-h-100 rounded-circle b-1 border-white text-center mx-auto">
                            <span class="text-white fs-40 icon-Globe"><span class="path1"></span><span class="path2"></span></span>
                        </div>
                        <h1 class="countnm my-10 text-white">{{$statistics->feedbacks}}</h1>
                        <div class="text-uppercase text-white">POSITIVE FEEDBACKS</div>
                    </div>
                </div>			
            </div>
        </div>
    </div>
</section>
<section class="py-50">
    <div class="container">		
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme owl-btn-1" data-nav-arrow="true" data-nav-dots="false" data-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-xx-items="1">
                    <div class="item">
                        <div class="text-center">
                            <div class="bg-primary-light w-50 mx-auto rounded-circle overflow-hidden">
                                <img src="../images/front-end-img/avatar/5.jpg" class="avatar-lg w-auto" alt="">
                            </div>
                            <div class="max-w-750 mx-auto">									
                                <div class="testimonial-info">
                                    <h4 class="name mb-0 mt-10">Jose Oliveira</h4>
                                </div>
                                <div class="testimonial-content">
                                    <ul class="cours-star">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                    </ul>
                                    <p class="fs-16">Fxbitrade is seamlessly presented and with professional grade design, this is in a different league to the overwhelming majority of other cryptocurrency A.I trading systems I have come accross...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text-center">
                            <div class="bg-primary-light w-50 mx-auto rounded-circle overflow-hidden">
                                <img src="../images/front-end-img/avatar/4.jpg" class="avatar-lg w-auto" alt="">
                            </div>
                            <div class="max-w-750 mx-auto">									
                                <div class="testimonial-info">
                                    <h4 class="name mb-0 mt-10">Lucia Audberg</h4>
                                </div>
                                <div class="testimonial-content">
                                    <ul class="cours-star">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                    </ul>
                                    <p class="fs-16">I must say that this platform was specially made for novice investors like myself who are enthusiatic about the cryptocurrency market. This is just easy money making at it's peak...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="text-center">
                            <div class="bg-primary-light w-50 mx-auto rounded-circle overflow-hidden">
                                <img src="../images/front-end-img/avatar/9.jpg" class="avatar-lg w-auto" alt="">
                            </div>
                            <div class="max-w-750 mx-auto">									
                                <div class="testimonial-info">
                                    <h4 class="name mb-0 mt-10">Reo Hicks</h4>
                                    <p>-Art Director</p>
                                </div>
                                <div class="testimonial-content">
                                    <ul class="cours-star">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                    </ul>
                                    <p class="fs-16">Making money while I sleep has been one of my life long dreams now I'm proud to say that this automated trading system has helped me actualize that dream...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>
</section>

<section class="py-50 bg-white" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-12 text-center">
                <h1 class="mb-15">Latest Transactions</h1>					
                <hr class="w-100 bg-primary">
            </div>
        </div>
        <div class="row">
			<div class="col-lg-6 col-12">
				<div class="box">
					<div class="box-header with-border">
					    <h4 class="box-title">Latest Deposits</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-bordered dataTable no-footer table-striped" id="dataTable_crypto" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th colspan="2" rowspan="1">Currency</th>
                                        <th class="text-right">Name</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestDeposits as $latestDeposit)
                                    <tr role="row">
                                        <td>
                                            <div style="width: 24px;height:24px">
                                                <?= $latestDeposit->currency->image  ?>
                                            </div>
                                        </td>
                                        <td>
                                            <small>
                                                <a href="#" class="hover-warning"> 
                                                    {{$latestDeposit->currency->name}}
                                                </a>
                                            </small>
                                            <h6 class="text-muted">{{$latestDeposit->currency->acronym}}</h6>
                                        </td>
                                        <td class="text-right"><p>{{$latestDeposit->user->username}}</p></td>
                                        <td class="text-right"><p><span>$</span> {{$latestDeposit->amount}}</p></td>
                                    </tr>
                                    @endforeach
                                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
            <div class="col-12 col-lg-6">
				<div class="box">
					<div class="box-header with-border">
					    <h4 class="box-title">Latest Withdrawal</h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-bordered dataTable no-footer table-striped" id="dataTable_crypto" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th colspan="2" rowspan="1">Currency</th>
                                        <th class="text-right">Name</th>
                                        <th class="text-right">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($latestWithdrawals as $latestWithdrawal)
                                    <tr role="row">
                                        <td>
                                            <div style="width: 24px;height:24px">
                                                <?= $latestWithdrawal->currency->image  ?>
                                            </div>
                                        </td>
                                        <td>
                                            <small>
                                                <a href="#" class="hover-warning"> 
                                                    {{$latestWithdrawal->currency->name}}
                                                </a>
                                            </small>
                                            <h6 class="text-muted">{{$latestWithdrawal->currency->acronym}}</h6>
                                        </td>
                                        <td class="text-right"><p>{{$latestWithdrawal->user->username}}</p></td>
                                        <td class="text-right"><p><span>$</span> {{$latestWithdrawal->amount}}</p></td>
                                    </tr>
                                    @endforeach
                                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</section>
@endsection()





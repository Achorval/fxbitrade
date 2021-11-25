@extends('landing.layouts.app')

@section('content')
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(../images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">How It Work</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="{{route('welcome')}}" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">How it Work</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Page content -->
	
	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12">
					<div class="blog-post mb-30">
						<div class="entry-image clearfix">
							<ul class="list-unstyled grid-post">
								<li>
									<img class="img-fluid" src="../images/front-end-img/courses/10f.jpg" alt="">
								</li>
								<li>
									<img class="img-fluid" src="../images/front-end-img/courses/11f.jpg" alt="">
								</li>
								<li>
									<img class="img-fluid" src="../images/front-end-img/courses/12f.jpg" alt="">
								</li>
								<li>
									<img class="img-fluid" src="../images/front-end-img/courses/9f.jpg" alt="">
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-12">
					<div class="side-block px-20 py-10 bg-white">
						<div class="widget clearfix">
							<h1>How FxBitrade Work</h1>
						</div>
                        <div class="widget">
							<h4 class="pb-5 mb-5 bb-1">REGISTRATION</h4>
							<p>As a new user, navigate to the registration page, fill up the registration form and click sign up. Go to your email and verify your account through the verification link.</p>
						</div>
						<div class="widget clearfix">
							<h4 class="pb-5 mb-5 bb-1">Funding</h4>
                            <p>After successfully registering, login to your dashboard and do the following:</p>
							<ul class="list list-unstyled">
								<li><i class="fa fa-angle-double-right"></i> Navigate to Deposit</li>
								<li><i class="fa fa-angle-double-right"></i> Click on Add Fund</li>
								<li><i class="fa fa-angle-double-right"></i> Select desired plan</li>
								<li><i class="fa fa-angle-double-right"></i> Select Payment method (Bitcoin, Ethereum, or USDT)</li>
								<li><i class="fa fa-angle-double-right"></i> Input the amount you wish to deposit</li>
                                <li><i class="fa fa-angle-double-right"></i> Copy the wallet address or scan the barcode and make payment from your wallet</li>
                                <li><i class="fa fa-angle-double-right"></i> Deposit will reflect on your dashbord after 1 transaction comfirmation (usually between 5 - 30 minutes depending on traffic on the blockchain network).</li>
							</ul>
						</div>

                        <div class="widget clearfix">
							<h4 class="pb-5 mb-5 bb-1">Trading</h4>
                            <p>When deposit is completed, the AI bot is automatically activated and trading commences. The AI bot selects the best performing pairs in the market and trades conservatively.</p>
						</div>

                        <div class="widget clearfix">
							<h4 class="pb-5 mb-5 bb-1">Withdrawal</h4>
                            <p>Profit Withdrawal based on the invested plan. At the end of the duration of the selected plan, profit accured is processed and dispatched to investors wallet address. However, Investors can opt to compound their earnings as this is also an alternative strategy to boosting capital and prospective earnings.</p>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</section>	
@endsection()
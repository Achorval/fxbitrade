
@extends('landing.layouts.app')

@section('content')
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(../images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">FAQs</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="{{route('welcome')}}" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">FAQs</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="py-50 cust-accordion">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="tab-wrapper v1">
						<div class="list">
							<div class="item">
								<div class="tab-btn">
									<a href="#">What is Fxbitrade Investment Limited?<em class="mdi mdi-plus"></em></a>
								</div>
								<div class="tab-content">
									<p>Fxbitrade Investment Limited is founded by a team of professional Forex & Crypto traders who know exactly what it takes to earn the most from capital market. Our company provides a full investment service focused on the Forex and cryptocurrency trading market. Each trader in our company has more than 7 years of trading experience and successful trading records, as we know that is the exact point that support our company stability and profitability.</p>
								</div>
							</div>
							<div class="item">
								<div class="tab-btn"><a href="#">How does Fxbitrade work? <em class="mdi mdi-plus"></em></a> </div>
								<div class="tab-content">
								<p>With the help mathematical algorithms and artificial intelligence, Fxbitrade trades and manages your money in the crypto market for the sole purpose of earning you profits.</p>
								</div>
							</div>
							<div class="item">
								<div class="tab-btn"><a href="#"> How long has Fxbitrade been around? <em class="mdi mdi-plus"></em></a></div>
								<div class="tab-content">
									<p>Fxbitrade was launched in 2018.</p>
								</div>
							</div>
							<div class="item">
								<div class="tab-btn"><a href="#"> Who can get involved with Fxbitrade? <em class="mdi mdi-plus"></em></a></div>
								<div class="tab-content">
									<p>We accept members from all over the world, irrespective of their citizenship. Our services are available to any individual or legal entity in the world.</p>
								</div>
							</div>
							<div class="item">
								<div class="tab-btn"><a href="#">How can I track my investment progress? <em class="mdi mdi-plus"></em></a></div>
								<div class="tab-content">
									<p>Log into your account from our website and see the progress in real-time. </p>
								</div>
							</div>
							<div class="item">
								<div class="tab-btn">
									<a href="#">How long deos it take for investment to reflect in account?<em class="mdi mdi-plus"></em></a>
								</div>
								<div class="tab-content">
									<p>Deposit will reflect on your dashbord after 1 transaction comfirmation (usually between 5 - 30 minutes depending on traffic on the blockchain network).</p>
								</div>
							</div>
							<div class="item">
								<div class="tab-btn"><a href="#">How long does it take to process withdrawals?<em class="mdi mdi-plus"></em></a> </div>
								<div class="tab-content">
								<p>Withdrawals are processed and dispatched to your wallet address instantly.</p>
								</div>
							</div>
							<div class="item">
								<div class="tab-btn"><a href="#">Can profit be compounded?<em class="mdi mdi-plus"></em></a> </div>
								<div class="tab-content">
								    <p>YES!</p>
								</div>
							</div>
							<div class="item">
								<div class="tab-btn"><a href="#">Can I topup my account to upgrade to the next plan?<em class="mdi mdi-plus"></em></a> </div>
								<div class="tab-content">
								<p>Yes you can, anytime.</p>
								</div>
							</div>
							<div class="item">
								<div class="tab-btn"><a href="#">What Payment options are available?<em class="mdi mdi-plus"></em></a> </div>
								<div class="tab-content">
								<p>Bitcoin, Ethereum USDT and Perfect Money.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
@endsection()
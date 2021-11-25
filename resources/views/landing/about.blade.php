@extends('landing.layouts.app')

@section('content')
	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(../images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">About us</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="{{route('welcome')}}" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">About us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="py-50 bg-white">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 col-12">
					<h2 class="mb-10">Company Overview</h2>
					<h4 class="fw-400">About Fxbitrade</h4>
					<p class="fs-16">Fxbitrade was founded in 2018 as a market-proven Artificial Intelligence trading/crypto portfolio management platform built on the blockchain network. It is one of the first cohesive and actionable set of crypto AI techniques to service the blockchain investment market. Fxbitrade solutions are designed to scale with the increasing size of different crypto assets available for trading.</p>
                    <p class="fs-16">As the number of coins continues to grow so will our ability to filter the noise of market activity and provide valuable data on all developments. With over $100 million worth of crypto assets under management, Fxbitrade is open to novice, professional, and institutional investors who wish to make the best returns out of the ever volatile crypto market.</p>
					<a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
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

	<section class="py-100" data-jarallax='{"speed": 0.4}' style="background-image: url(../images/front-end-img/background/bg-3.jpg);" data-overlay="5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-12">				
					<div class="text-center text-white">
						<h2 class="mb-15 fw-600 fs-40">Best Solution for your business</h2>
						<h4>Live Treding Facility</h4>
						<p>Our deep sector knowledge and unrivaled insight into the private fund market across several asset classes allows us to raise capital efficiently and effectively. We thrive on working alongside the most innovative funds and consistently partner with the highest-quality fund managers.</p>
						<div class="mt-5"><a href="{{route('register')}}" class="btn btn-primary">Invest Now!</a></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="py-50">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
                    <div class="box pull-up h-p100 mb-md-0">
                        <div class="box-body">
							<div class="me-15 features">
								<i class="fa fa-graduation-cap"></i>
							</div>
							<h3 class="box-title my-20">Our Philosophy</h3>
                            <p class="text-fade fs-16">Crypto Trading attracts a lot of intellectuals, but the results sometimes can be overwhelmingly disappointing. With Trusthold AI System it is impossible to achieve near perfection in trading. There is no limit to the amount of money you can earn.</p>
                        </div>
                    </div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
                    <div class="box pull-up h-p100 mb-md-0">
                        <div class="box-body">
                            <div class="me-15 features">
								<i class="fa fa-gears"></i>
							</div>
							<h3 class="box-title my-20">Our Mission</h3>
                            <p class="text-fade fs-16">Our mission is to add value with active AI portfolio management to help our clients reach their short/long-term financial goals. We achieve this through our Alpha & Beta Bot strategies, adhering to our values and investment principles.</p>
                        </div>
                    </div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
                    <div class="box pull-up h-p100 mb-md-0">
                        <div class="box-body">
							<div class="me-15 features">
								<i class="fa fa-handshake-o"></i>
							</div>
							<h3 class="box-title my-20">Our Vission</h3>
                            <p class="text-fade fs-16">To be a successful AI investment platform through the application of the highest professional standards, drawing on our investment experience and AI system algorithms.</p>
                        </div>
                    </div>
				</div>
				<div class="col-lg-3 col-md-6 col-12">
                    <div class="box pull-up h-p100 mb-md-0">
                        <div class="box-body">
							<div class="me-15 features">
								<i class="fa fa-key"></i>
							</div>
							<h3 class="box-title my-20">Key Of Success</h3>
                            <p class="text-fade fs-16">We are firmly in support of financial freedom and the liberty that Bitcoin provides globally for anyone to voluntarily participate in a permissionless and decentralized network.</p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</section>
	
@endsection()
	
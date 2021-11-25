@extends('landing.layouts.app')

@section('content')

	<section class="bg-img pt-150 pb-20" data-overlay="7" style="background-image: url(../images/front-end-img/background/bg-8.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="text-center">						
						<h2 class="page-title text-white">Investment Plans</h2>
						<ol class="breadcrumb bg-transparent justify-content-center">
							<li class="breadcrumb-item"><a href="{{route('welcome')}}" class="text-white-50"><i class="mdi mdi-home-outline"></i></a></li>
							<li class="breadcrumb-item text-white active" aria-current="page">Plans</li>
						</ol>
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
              <p><strong>Withdrawal After</strong> {{$plan->duration}}</p>

              <br><br>
              <a class="btn btn-rounded btn-{{$plan->color}}" href="{{route('register')}}">
                Select plan
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
		</div>
	</section>	

@endsection()
@extends('user.layouts.app')

@section('content')

@include('user.layouts.sidebar')

<div class="content-wrapper">
  <div class="container-full">
    <div class="content-header">
      <h3>Select Plan</h3>
    </div>
    <section class="content">
      <div class="row">
        @if (!empty($plans))
        @foreach ($plans as $plan)
        <div class="col-lg-3">
          <div class="box">
            <div class="box-body text-center">
              <h3 class="price">
                {{$plan->percent}}%
                <span>After {{$plan->duration}}</span>
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
              <a class="btn btn-rounded btn-{{$plan->color}}" href="{{route('depositMethod', ['id'=>Crypt::encrypt($plan->id)])}}">
                Select plan
              </a>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <div class="col-lg-12">
          <div class="box">
            <div class="box-body text-center text-primary"><svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg><h4 class="my-2">You don’t have plans yet</h4></div>
          </div>
        </div>
        @endif
      </div>
    </section> 
  </div>
</div>

@endsection()



@extends('admin.layouts.app')

@section('content')

@include('admin.layouts.sidebar')

<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <h3>{{$user->username}} Active Deposits</h3>
        </div> 
        <section class="content">
            <div class="row">	
                <div class="col-12">
                    <div class="box">
                        <div class="box-body p-15">						
                            <div class="table-responsive">
                                <table id="tickets" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Amount</th>
                                            <th colspan="2" rowspan="1">Currency</th>
                                            <th>Reference</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sn = 1 ?>
                                        @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{$sn++}}</td>
                                            <td>${{$transaction->amount}}</td>
                                            <td>
                                                <div style="width: 24px;height:24px">
                                                    <?= $transaction->currency->image  ?>
                                                </div>
                                            </td>
                                            <td>
                                                <small>
                                                    <a href="#" class="hover-warning"> 
                                                    {{ $transaction->currency->name }}</a>
                                                </small>
                                                <h6 class="text-muted">BTC</h6>
                                            </td>
                                            <td>{{$transaction->reference}}</td>
                                            <td>{{$transaction->description}}</td>
                                            <td>
                                                @if ($transaction->status->name == "Successful")
                                                <span class="badge badge-success">
                                                    {{$transaction->status->name}}
                                                </span> 
                                                @elseif($transaction->status->name == "Canceled")
                                                    <span class="badge badge-danger">
                                                        {{$transaction->status->name}}    
                                                    </span> 
                                                @else
                                                    <span class="badge badge-warning">
                                                        {{$transaction->status->name}}    
                                                    </span> 
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-primary shadow btn-xs sharp mr-1 processDeposit" data-user_id="{{$user->id}}" data-id="{{$transaction->id}}" >Process</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection()
@extends('admin.layouts.app')

@section('content')

@include('admin.layouts.sidebar')

<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <h3>Transactions History</h3>
        </div> 
        <section class="content">
            <div class="row">	
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">						
                            <h4 class="box-title">Transactions</h4>
                            <h6 class="box-subtitle">List of transactions by customers</h6>
                        </div>
                        <div class="box-body p-15">						
                            <div class="table-responsive">
                                <table id="tickets" class="table mt-0 table-hover no-wrap table-bordered" data-page-size="10">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Amount</th>
                                            <th colspan="2" rowspan="1">Currency</th>
                                            <th>Reference</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $sn = 1 ?>
                                        @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>{{$sn++}}</td>
                                            <td>{{$transaction->user->username}}</td>
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
                                                <h6 class="text-muted">{{$transaction->currency->acronym}}</h6>
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
                                            <td>{{$transaction->created_at}}</td>
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
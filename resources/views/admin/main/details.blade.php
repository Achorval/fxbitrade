@extends('admin.layouts.app')

@section('content')

@include('admin.layouts.sidebar')

<div class="content-wrapper"> 
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">User Details</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-wrap table-bordered" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <table class="table table-hover table-bordered" style="width: 100%">
                                                <tbody>
                                                    <tr><th style="width: 45%">Username:</th><td  style="width: 55%">{{$user->username}}</td></tr>
                                                    <tr><th style="width: 45%">Full Name:</th><td style="width: 55%">{{$user->name}}</td></tr>
                                                    <tr><th>E-mail:</th><td>{{$user->email}}</td></tr>
                                                </tbody>
                                            </table>
                                            {{-- <table class="table table-hover table-bordered" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>Processing</th>
                                                        <th>Balance</th>
                                                    </tr>
                                                </thead>
                                                @empty(!$balances)
                                                <tbody>
                                                    @foreach ($balances as $balance)
                                                    <tr>
                                                        <td style="width: 45%">
                                                            <div class="d-flex align-items-center">
                                                                <div class="mr-2" style="width: 24px;height:24px;margin-bottom:5px">
                                                                    <?= $balance->currency->image ?>
                                                                </div>
                                                                <h6 class="text-muted mb-0">{{$balance->currency->name}}</h6>
                                                            </div>
                                                        </td>
                                                        <td style="width: 55%">${{$balance->current}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @endempty
                                            </table> --}}
                                            <table class="table table-hover table-bordered" style="width: 100%">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 45%">Total Balance:</th>
                                                        <td style="width: 55%">
                                                            ${{$balance->current}}
                                                            <div class="d-inline float-right">
                                                                <a href="/admin/transactions" class="btn btn-primary btn-xs">
                                                                History</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 45%">Total Deposit:</th>
                                                        <td style="width: 55%">
                                                            ${{$totalDeposit}}
                                                            <div class="d-inline float-right">
                                                                <a href="/admin/transactions" class="btn btn-primary btn-xs">
                                                                History</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 45%">Active Deposit:</th>
                                                        <td style="width: 55%">
                                                            ${{$ActiveDeposit}}
                                                            <div class="d-inline float-right">
                                                                <a href="{{route('activeDeposits', ['id'=>$user->id])}}" class="btn btn-danger btn-xs">
                                                                    Manage Deposit
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 45%">Total Earning:</th>
                                                        <td style="width: 55%">
                                                            ${{$totalEarning}}
                                                            <div class="d-inline float-right">
                                                                <a href="/admin/transactions" class="btn btn-primary btn-xs">
                                                                History</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 45%">Total Withdrawal:</th>
                                                        <td style="width: 55%">
                                                            ${{$totalWithdrawal}}
                                                            <div class="d-inline float-right">
                                                                <a href="/admin/transactions" class="btn btn-primary btn-xs">
                                                                History</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 45%">Pending Withdrawals:</th>
                                                        <td style="width: 55%">
                                                            ${{$pendingWithdrawal}}
                                                            <div class="d-inline float-right">
                                                                <a href="/admin/transactions" class="btn btn-primary btn-xs">
                                                                History</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 45%">Total Bonus:</th>
                                                        <td style="width: 55%">
                                                            ${{$totalBonus}}
                                                            <div class="d-inline float-right">
                                                                <a href="/admin/transactions/user/{{$user->id}}" class="btn btn-danger btn-xs">
                                                                Add a Bonus</a>
                                                                <a href="/admin/transactions" class="btn btn-primary btn-xs">
                                                                    History</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="width: 45%">Referral Commissions:</th>
                                                        <td style="width: 55%">
                                                            ${{$referralCommission}}
                                                            <div class="d-inline float-right">
                                                                <a href="/admin/transactions" class="btn btn-primary btn-xs">
                                                                History</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </tr>
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
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
                            <h4 class="box-title">Manual Process Withdrawal</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <form class="processWithdrawPay" data-id="{{$transaction->id}}">
                                    <table class="table no-wrap table-bordered" style="width: 100%">
                                        <tbody>
                                            <tr>
                                                <table class="table table-hover table-bordered" style="width: 100%">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width: 45%">Username:</th>
                                                            <td  style="width: 55%">
                                                                {{$user->username . ' ('.$user->name.')'}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 45%">Payment System:</th>
                                                            <td style="width: 55%">
                                                                <div class="d-flex align-items-center">
                                                                    <h6 class="text-muted mr-2">{{$transaction->currency->name}}</h6>
                                                                    <div style="width: 24px;height:24px;margin-bottom:5px">
                                                                        <?= $transaction->currency->image ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Payee Account:</th>
                                                            <td>{{$transaction->address}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Amount:</th>
                                                            <td>${{$transaction->amount}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>BTC Amount:</th>
                                                            <td>0.00003082</td>
                                                        </tr>
                                                        <tr>
                                                            <th>User Comment:</th>
                                                            <td>Your comment</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-hover table-bordered" style="width: 100%">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="mx-auto" style="max-width: 200px">
                                                                    <img src="{{asset('images/qrcode.png')}}" alt="codeQR">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">Confirm transaction has been paid</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>							
    </div>
</div>

@endsection()
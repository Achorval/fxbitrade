@extends('admin.layouts.app')

@section('content')

@include('admin.layouts.sidebar')

<div class="content-wrapper"> 
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-md-7">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Add a Transaction</h4>
                        </div>
                        <div class="box-body">
                            <form class="addTransactionForm" action="{{route('createAddTransaction', ['id'=>$user->id])}}">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table no-wrap table-bordered" style="width: 100%">
                                        <tbody>
                                            <tr>
                                                <table class="table table-hover table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width: 30%">
                                                                <label for="emailAddress1">User :</label>
                                                            </th>
                                                            <td style="width: 70%">
                                                                <a href="{{route('userDetails', ['id'=>$user->id])}}">{{$user->username}}</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 30%">
                                                                <label for="emailAddress1">Payment Method :</label>
                                                            </th>
                                                            <td style="width: 70%">
                                                                <select name="currency" id="currency" class="form-control" aria-invalid="false">
                                                                    @foreach ($currencies as $currency)
                                                                        <option value="{{$currency->id}}">{{$currency->name}}</option>
                                                                    @endforeach 
                                                                </select>
                                                                <span class="invalid-feedback animated fadeInUp currency-feedback" style="display: block;">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 30%">
                                                                <label for="amount">Amount ($) :</label>
                                                            </th>
                                                            <td style="width: 70%">
                                                                <input type="number" class="form-control" name="amount" id="amount" placeholder="Amount"> 
                                                                <span class="invalid-feedback animated fadeInUp amount-feedback" style="display: block;">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 30%">
                                                                <label for="type">Transaction Type :</label></th>
                                                            <td style="width: 70%">
                                                                <select name="type" id="type" class="form-control" aria-invalid="false">
                                                                    @foreach ($types as $type)
                                                                        <option value="{{$type->id}}">{{$type->name}}</option>    
                                                                    @endforeach 
                                                                </select>
                                                                <span class="invalid-feedback animated fadeInUp type-feedback" style="display: block;">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 30%">
                                                                <label for="emailAddress1">Description :</label>
                                                            </th>
                                                            <td style="width: 70%">
                                                                <input type="text" class="form-control" name="description" id="description" placeholder="Description"> 
                                                                <span class="invalid-feedback animated fadeInUp description-feedback" style="display: block;">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 30%">
                                                                <label for="deposit">Deposit the Bonus :</label>
                                                            </th>
                                                            <td style="width: 70%">
                                                                <select name="deposit" id="deposit" class="form-control" aria-invalid="false">
                                                                    <option value="0">-- Not Deposit --</option>
                                                                    @foreach ($plans as $plan)
                                                                        <option value="{{$plan->id}}">{{$plan->percent}}% profit after {{$plan->duration}}</option> 
                                                                    @endforeach
                                                                </select>
                                                                <span class="invalid-feedback animated fadeInUp bonus-feedback" style="display: block;">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 30%">
                                                                <label for="referral">Add Referral Commission :</label>
                                                            </th>
                                                            <td style="width: 70%">
                                                                <select name="referral" id="referral" class="form-control" aria-invalid="false">
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option> 
                                                                </select>
                                                                <span class="invalid-feedback animated fadeInUp referral-feedback" style="display: block;">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="width: 30%">
                                                                <label for="email">Send Email Notification :</label>
                                                            </th>
                                                            <td style="width: 70%">
                                                                <select name="email" id="email" class="form-control" aria-invalid="false">
                                                                    <option value="1">Yes</option>
                                                                    <option value="0">No</option> 
                                                                </select>
                                                                <span class="invalid-feedback animated fadeInUp email-feedback" style="display: block;">
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table no-wrap table-bordered" style="width: 100%">
                                        <tr>
                                            <table class="table table-hover table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <th style="width: 40%">
                                                            <label for="password">Admin Alternative Passphrase:</label>
                                                        </th>
                                                        <td style="width: 60%">
                                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password"> 
                                                        </td>
                                                        <span class="invalid-feedback animated fadeInUp password-feedback" style="display: block;">
                                                        </span>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </tr>
                                    </table>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="waves-effect waves-light btn btn-primary my-10 d-block w-p100 d-flex align-items-center justify-content-center">Send Transaction</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>							
    </div>
</div>

@endsection()

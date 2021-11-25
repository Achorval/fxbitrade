<?php

namespace App\Http\Controllers;

use Helper;
use Response;
use Validator;
use App\Models\Balance;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Models\Plan;
use App\Models\User;
use App\Models\Type;
use App\Models\System;
use App\Models\Referral;
use App\Models\Statistics;
use App\Models\Transaction;
use App\Mail\WithdrawalEmail;
use App\Mail\DepositEmail;
use App\Mail\NotifyEmail;
use Illuminate\Support\Facades\Auth;
use App\Models\Referral_Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('role.superadministrator');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Dashboard";

        $users = User::where(
            'system_id', '=', Auth::user()->system_id
        )->get();

        $totalEarning = Transaction::where([
            ['type_id', '=', 3],
            ['status_id', '=', 1],
            ['system_id', '=', Auth::user()->system_id]
        ])->sum('amount');

        $totalWithdrawal = Transaction::where([
            ['type_id', '=', 4],
            ['status_id', '=', 1],
            ['system_id', '=', Auth::user()->system_id]
        ])->sum('amount');

        $referralCommission = Transaction::where([
            ['type_id', '=', 5],
            ['status_id', '=', 1],
            ['system_id', '=', Auth::user()->system_id]
        ])->sum('amount');

        $pendingWithdrawal = Transaction::where([
            ['type_id', '=', 4],
            ['status_id', '=', 3],
            ['system_id', '=', Auth::user()->system_id]
        ])->sum('amount');

        return view('admin.main.index', compact('title','users','totalEarning','totalWithdrawal','referralCommission','pendingWithdrawal'));
    }

    /**
     * Show the application users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users(Request $request)
    {
        $title = "Users";

        if ($request->input('search')) {
            $users = User::where('name', 'like', '%' . $request->input('search') . '%')
                ->orWhere('username', 'like', '%' . $request->input('search') . '%')
                ->get();
        } else {
            $users = User::where(
                'system_id', '=', Auth::user()->system_id
            )->orderBy('id', 'desc')->get();
        }

        return view('admin.main.users', [
            'title' => $title,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        $title = "Edit User";

        $user = User::where('id', '=', $id)->first();
        
        return view('admin.main.edit', [
            'title' => $title,
            'user'  => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'username' => 'required',
            'email'    => 'required',
            'status'   => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error1',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        $user = User::where('id', '=', $id)->first();
        
        if(!$user) {
            return Response::json([
                'status' => 'error2',
                'message'  => 'User account not found'
            ]);
        } else {
            if (Hash::check($request->input('password'), Auth::user()->password)) {
                
                User::where([
                    ['id', $id],
                    ['system_id', '=', Auth::user()->system_id]
                ])->update([
                    'name'     => $request->input('name'),
                    'username' => $request->input('username'),
                    'email'    => $request->input('email'),
                    'status'   => $request->input('status')
                ]);
        
                return Response::json([
                    'status'  => 'success',
                    'message' => 'User have been updated successfully!'
                ]);

            }else {
                return Response::json([
                    'status' => 'error3',
                    'message'  => 'Incorrect admin password'
                ]);
            }
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userDetails($id)
    {
        $title = "User Details";

        $user = User::where('id', '=', $id)->first();

        $balance = Balance::where([
            ['user_id', '=', $id],
            ['status', '=', true]
        ])->first();

        $totalDeposit = Transaction::where([
            ['user_id',   '=', $id],
            ['type_id',   '=', 1],
            ['status_id', '=', 1]
        ])->sum('amount');

        $ActiveDeposit = Transaction::where([
            ['user_id',   '=', $id],
            ['type_id',   '=', 1],
            ['status_id', '=', 3]
        ])->sum('amount');

        $totalEarning = Transaction::where([
            ['user_id', '=', $id],
            ['type_id', '=', 3],
            ['status_id', '=', 1]
        ])->sum('amount');

        $totalWithdrawal = Transaction::where([
            ['user_id', '=', $id],
            ['type_id', '=', 4],
            ['status_id', '=', 1]
        ])->sum('amount');

        $pendingWithdrawal = Transaction::where([
            ['user_id', '=', $id],
            ['type_id', '=', 4],
            ['status_id', '=', 3]
        ])->sum('amount');

        $totalBonus = Transaction::where([
            ['user_id', '=', $id],
            ['type_id', '=', 2],
            ['status_id', '=', 1]
        ])->sum('amount');

        $referralCommission = Transaction::where([
            ['user_id', '=', $id],
            ['type_id', '=', 5],
            ['status_id', '=', 1]
        ])->sum('amount');
        
        return view('admin.main.details', [
            'title'              => $title, 
            'user'               => $user,
            'balance'            => $balance,
            'totalDeposit'       => $totalDeposit,
            'ActiveDeposit'      => $ActiveDeposit,
            'totalEarning'       => $totalEarning,
            'totalWithdrawal'    => $totalWithdrawal,
            'pendingWithdrawal'  => $pendingWithdrawal,
            'totalBonus'         => $totalBonus,
            'referralCommission' => $referralCommission
        ]);
    }

    /**
     * Show the application user active Deposits.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function activeDeposits($id) 
    {
        $title = "Active Transactions";

        $user = User::where([
            ['id',   '=', $id],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $transactions = Transaction::where([
            ['user_id',   '=', $id],
            ['system_id', '=', Auth::user()->system_id],
            ['type_id',   '=', 1],
            ['status_id', '=', 3]
        ])->with(['type','currency','status'])->orderBy('id', 'desc')->get();
        
        return view('admin.history.activeDeposits', [
            'title'        => $title,
            'user'         => $user,
            'transactions' => $transactions
        ]);
    } 


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processDeposit($id)
    {
        $transaction = Transaction::where([
            ['id', '=', $id],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        if ($transaction) {

            Transaction::where([
                ['id', $id],
                ['system_id', '=', Auth::user()->system_id]
            ])->update([
                'status_id' => 1
            ]);

            $balance = Balance::where([
                ['user_id',     '=', $transaction->user_id],
                ['system_id',   '=', Auth::user()->system_id],
                ['status',      '=', true]
            ])->first();

            Balance::where([
                ['user_id',     '=', $transaction->user_id],
                ['system_id',   '=', Auth::user()->system_id],
                ['status',      '=', true]
            ])->update(['status' => false]);

            Balance::create([
                'previous'       => $balance->current,
                'current'        => $balance->current + $transaction->amount,
                'user_id'        => $transaction->user_id,
                'transaction_id' => $transaction->id,
                'system_id'      => Auth::user()->system_id,
                'status'         => true,
            ]);

            $referer = Referral::where([
                ['user_id', '=', $transaction->user_id],
                ['system_id', '=', Auth::user()->system_id]
            ])->first();

            if ($referer) {

                $user = User::where([
                    ['username',  '=', $referer->refererUsername],
                    ['system_id', '=', $referer->system_id]
                ])->first();

                $referralSetting = Referral_Setting::where([
                    ['system_id', '=', Auth::user()->system_id],
                    ['status', '=', true]
                ])->first();

                if ($user && $referralSetting) {

                    $commission = ($referralSetting->percent/100)*$transaction->amount;

                    $transaction1 = Transaction::create([
                        'user_id'      => $user->id,
                        'type_id'      => 5,
                        'currency_id'  => $transaction->currency_id,
                        'reference'    => Helper::reference(10),
                        'amount'       => $commission,
                        'description'  => 'Earned ' . $commission . ' referral commission',
                        'system_id'    => $user->system_id,
                        'status_id'    => 1
                    ]);      
                    
                    if ($transaction1) {

                        $balance1 = Balance::where([
                            ['user_id',     '=', $user->id],
                            ['system_id',   '=', $user->system_id],
                            ['status',      '=', true]
                        ])->first();
        
                        Balance::where([
                            ['user_id',     '=', $user->id],
                            ['system_id',   '=', $user->system_id],
                            ['status',      '=', true]
                        ])->update(['status' => false]);
        
                        Balance::create([
                            'previous'       => $balance1->current,
                            'current'        => $balance1->current + $commission,
                            'user_id'        => $user->id,
                            'transaction_id' => $transaction1->id,
                            'system_id'      => $user->system_id,
                            'status'         => true,
                        ]);
                    }
                }
            } 

            $user = User::where([
                ['id',     '=', $transaction->user_id],
                ['system_id',   '=', Auth::user()->system_id]
            ])->first();

            $record = array(
                'name'    => Auth::user()->name, 
                'subject' => "Deposit has been sent",
                'amount'  => $transaction->amount
            );

            Mail::to($user->email)->send(new DepositEmail($record));

            return Response::json([
                'status'  => 'success',
                'message' => 'Transaction deposit have been processed successfully!'
            ]);
        }
    }

    /**
     * Show the application withdrawal requests.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function withdrawalRequests()
    {
        $title = "Transactions";

        $transactions = Transaction::where([
            ['system_id', '=', Auth::user()->system_id],
            ['type_id',   '=', 6],
            ['status_id', '=', 3],
        ])->with(['type','currency','status'])->orderBy('id', 'desc')->get();

        return view('admin.history.withdrawalRequests', [
            'title'        => $title,
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the application settings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function withdrawPay($id)
    {
        $title = "Manual Process Withdrawal";

        $transaction = Transaction::where([
            ['id',        '=', $id],
            ['system_id', '=', Auth::user()->system_id]
        ])->with(['type','currency','status'])->first();

        $user = User::where([
            ['id',        '=', $transaction->user_id],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        return view('admin.history.withdrawPay', [
            'title'       => $title,
            'user'        => $user,
            'transaction' => $transaction
        ]);
    }
    
    /**
     * Create a new resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function processWithdrawalPay($id)
    {
        $transaction = Transaction::where([
            ['id',        '=', $id],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $updatedTransaction = Transaction::where([
            ['id',        '=', $id],
            ['type_id',   '=', 6],
            ['system_id', '=', Auth::user()->system_id]
        ])->update(
            ['status_id' => 1],
            ['type_id'   => 4]
        );
        
        if ($transaction && $updatedTransaction) {

            $balance = Balance::where([
                ['user_id',     '=', $transaction->user_id],
                ['system_id',   '=', Auth::user()->system_id],
                ['status',      '=', true]
            ])->first();

            if ($balance->current >= $transaction->amount) {

                Balance::where([
                    ['user_id',     '=', $transaction->user_id],
                    ['system_id',   '=', Auth::user()->system_id],
                    ['status',      '=', true]
                ])->update(['status' => false]);

                Balance::create([
                    'previous'       => $balance->current,
                    'current'        => $balance->current - $transaction->amount,
                    'user_id'        => $transaction->user_id,
                    'currency_id'    => $transaction->currency_id,
                    'transaction_id' => $transaction->id,
                    'system_id'      => Auth::user()->system_id,
                    'status'         => true,
                ]);

                $user = User::where([
                    ['id',        '=', $transaction->user_id],
                    ['system_id', '=', Auth::user()->system_id]
                ])->first();

                $currency = Currency::where([
                    ['id',        '=', $transaction->currency_id],
                    ['system_id', '=', Auth::user()->system_id]
                ])->first();

                $record = array(
                    'name'     => $user->name, 
                    'subject'  => "Withdrawal has been sent",
                    'amount'   => $transaction->amount,
                    'address'  => $transaction->address,
                    'currency' => $currency->name
                );

                Mail::to($user->email)->send(new WithdrawalEmail($record));

                return Response::json([
                    'status'  => 'success',
                    'message' => 'Awesome, your withdrawal is on the way!',
                ]);
            }
        }
    }

    /**
     * Show the application currencies.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function currencies()
    {
        $title = "Currencies";

        $admin = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $currencies = Currency::where(
            'system_id', '=', Auth::user()->system_id
        )->orderBy('id', 'desc')->get();
           
        return view('admin.system.currency', [
            'title'      => $title,
            'admin'      => $admin,
            'currencies' => $currencies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCurrency()
    {
        $title = "Create Currency";

        return view('admin.currency.create', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCurrency(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'image'   => 'required',
            'address' => 'required',
            'acronym' => 'required',
            'status'  => 'required'
        ]);

        if($validator->fails()) {

            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        Currency::create([
            'name'      => $request->input('name'),
            'image'     => $request->input('image'),
            'address'   => $request->input('address'),
            'acronym'   => $request->input('acronym'),
            'system_id' => Auth::user()->system_id,
            'status'    => $request->input('status')
        ]);

        return Response::json([
            'status'  => 'success',
            'message' => 'Currency have been created successfully!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCurrency($id)
    {
        $currency = Currency::where([
            ['id', '=', $id],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();
        
        return Response::json([
            'status' => 'success',
            'data'   => $currency
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCurrency(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'image'   => 'required',
            'address' => 'required',
            'acronym' => 'required',
            'status'  => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        Currency::where([
            ['id', $id],
            ['system_id', '=', Auth::user()->system_id]
        ])->update([
            'name'    => $request->input('name'),
            'image'   => $request->input('image'),
            'address' => $request->input('address'),
            'acronym' => $request->input('acronym'),
            'status'  => $request->input('status')
        ]);

        return Response::json([
            'status'  => 'success',
            'message' => 'Currency have been updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCurrency($id)
    {
        Currency::find($id)->delete();

        return Response::json([
            'status'  => 'success',
            'message' => 'Currency have been deleted successfully!'
        ]);
    }

    /**
     * Show the application plans.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function plans()
    {
        $title = "Plans";

        $plans = Plan::where(
            'system_id', '=', Auth::user()->system_id
        )->orderBy('id', 'desc')->get();

        return view('admin.system.plan', [
            'plans' => $plans,
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePlan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'minimum'  => 'required',
            'maximum'  => 'required',
            'percent'  => 'required',
            'duration' => 'required',
            'support'  => 'required',
            'color'    => 'required',
            'status'   => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        Plan::create([
            'name'      => $request->input('name'),
            'minimum'   => $request->input('minimum'),
            'maximum'   => $request->input('maximum'),
            'percent'   => $request->input('percent'),
            'duration'  => $request->input('duration'),
            'support'   => $request->input('support'),
            'system_id' => Auth::user()->system_id,
            'color'     => $request->input('color'),
            'status'    => $request->input('status')
        ]);

        return Response::json([
            'status'  => 'success',
            'message' => 'Plan have been created successfully!'
        ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPlan($id)
    {
        $plan = Plan::where([
            ['id', '=', $id],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();
        
        return Response::json([
            'status' => 'success',
            'data'   => $plan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePlan(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'minimum'  => 'required',
            'maximum'  => 'required',
            'percent'  => 'required',
            'duration' => 'required',
            'support'  => 'required',
            'color'    => 'required',
            'status'   => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        Plan::where([
            ['id', $id],
            ['system_id', '=', Auth::user()->system_id]
        ])->update([
            'name'      => $request->input('name'),
            'minimum'   => $request->input('minimum'),
            'maximum'   => $request->input('maximum'),
            'percent'   => $request->input('percent'),
            'duration'  => $request->input('duration'),
            'support'   => $request->input('support'),
            'color'     => $request->input('color'),
            'status'    => $request->input('status')
        ]);

        return Response::json([
            'status'  => 'success',
            'message' => 'Plan have been updated successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePlan($id)
    {
        Plan::find($id)->delete();

        return Response::json([
            'status'  => 'success',
            'message' => 'Plan have been deleted successfully!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addTransaction($id)
    {
        $title = "Add Transaction";

        $user = User::where([
            ['id', '=', $id]
        ])->first();

        $currencies = Currency::where([
            ['system_id', '=', Auth::user()->system_id],
            ['status', '=', true]
        ])->orderBy('id', 'desc')->get();

        $types = Type::where([
            ['system_id', '=', Auth::user()->system_id],
            ['status', '=', true]
        ])->orderBy('id', 'desc')->get();

        $plans = Plan::where([
            ['system_id', '=', Auth::user()->system_id],
            ['status', '=', true]
        ])->get();

        return view('admin.history.addTransaction', [
            'title'      => $title,
            'user'       => $user,
            'currencies' => $currencies,
            'types'      => $types,
            'plans'       => $plans
        ]);
    }

    /**
     * Create a specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createAddTransaction(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'currency'    => 'required',
            'amount'      => 'required',
            'type'        => 'required',
            'description' => 'required',
            'deposit'     => 'required',
            'referral'    => 'required',
            'email'       => 'required',
            'password'    => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        if (Hash::check($request->input('password'), Auth::user()->password)) {

            if ($request->input('type') == 1) {

                $transaction = Transaction::create([
                    'user_id'      => $id,
                    'type_id'      => 1,
                    'currency_id'  => $request->input('currency'),
                    'plan_id'      => $request->input('deposit') == 0 ? NULL : $request->input('deposit'),
                    'reference'    => Helper::reference(10),
                    'amount'       => $request->input('amount'),
                    'description'  => $request->input('description'),
                    'system_id'    => Auth::user()->system_id,
                    'status_id'    => 1
                ]);

                if ($transaction) {

                    $balance = Balance::where([
                        ['user_id',     '=', $id],
                        ['system_id',   '=', Auth::user()->system_id],
                        ['status',      '=', true]
                    ])->first();

                    Balance::where([
                        ['user_id',     '=', $id],
                        ['system_id',   '=', Auth::user()->system_id],
                        ['status',      '=', true]
                    ])->update(['status' => false]);

                    Balance::create([
                        'previous'       => $balance->current,
                        'current'        => $balance->current + $request->input('amount'),
                        'user_id'        => $id,
                        'currency_id'    => $request->input('currency'),
                        'transaction_id' => $transaction->id,
                        'system_id'      => Auth::user()->system_id,
                        'status'         => true,
                    ]);

                    if ($request->input('email') == 1) {

                        $user = User::where([
                            ['id',  '=', $id],
                            ['system_id', '=', Auth::user()->system_id]
                        ])->first();

                        $record = array(
                            'name'    => $user->name, 
                            'subject' => "Deposit has been sent",
                            'content' => '$'.$request->input('amount'). ' has been successfully deposited to your account balance.'
                        );
            
                        Mail::to($user->email)->send(new NotifyEmail($record));

                    }

                    if ($request->input('referral') == 1) {

                        $referrer = Referral::where([
                            ['user_id', '=', $id],
                            ['system_id', '=', Auth::user()->system_id]
                        ])->first();

                        if ($referrer) {
                            
                            $userRef = User::where([
                                ['username',  '=', $referrer->refererUsername],
                                ['system_id', '=', $referrer->system_id]
                            ])->first();

                            $referralSetting = Referral_Setting::where([
                                ['system_id', '=', Auth::user()->system_id],
                                ['status', '=', true]
                            ])->first();

                            if ($referralSetting) {

                                $commission = ($referralSetting->percent/100)*$request->input('amount');

                                $transaction2 = Transaction::create([
                                    'user_id'      => $userRef->id,
                                    'type_id'      => 5,
                                    'currency_id'  => $request->input('currency'),
                                    'reference'    => Helper::reference(10),
                                    'amount'       => $commission,
                                    'description'  => 'You have earned '.$commission,
                                    'system_id'    => $userRef->system_id,
                                    'status_id'    => 1
                                ]);

                                if ($transaction2) {

                                    $balance2 = Balance::where([
                                        ['user_id',   '=', $userRef->id],
                                        ['system_id', '=', $userRef->system_id],
                                        ['status',    '=', true]
                                    ])->first();
                    
                                    Balance::where([
                                        ['user_id',   '=', $userRef->id],
                                        ['system_id', '=', $userRef->system_id],
                                        ['status',    '=', true]
                                    ])->update(['status' => false]);
                    
                                    Balance::create([
                                        'previous'       => $balance2->current,
                                        'current'        => $balance2->current + $commission,
                                        'user_id'        => $userRef->id,
                                        'transaction_id' => $transaction2->id,
                                        'system_id'      => $userRef->system_id,
                                        'status'         => true,
                                    ]);
                                }
                            }
                        }
                    }

                    return Response::json([
                        'status' => 'success',
                        'message'  => 'Transaction have been created successfully!'
                    ]);
                }
            }

            if ($request->input('type') == 2) {

                $transaction1 = Transaction::create([
                    'user_id'      => $id,
                    'type_id'      => 2,
                    'currency_id'  => $request->input('currency'),
                    'plan_id'      => $request->input('deposit') == 0 ? NULL : $request->input('deposit'),
                    'reference'    => Helper::reference(10),
                    'amount'       => $request->input('amount'),
                    'description'  => $request->input('description'),
                    'system_id'    => Auth::user()->system_id,
                    'status_id'    => 1
                ]);

                if ($transaction1) {

                    $balance1 = Balance::where([
                        ['user_id',     '=', $id],
                        ['system_id',   '=', Auth::user()->system_id],
                        ['status',      '=', true]
                    ])->first();

                    Balance::where([
                        ['user_id',     '=', $id],
                        ['system_id',   '=', Auth::user()->system_id],
                        ['status',      '=', true]
                    ])->update(['status' => false]);

                    Balance::create([
                        'previous'       => $balance1->current,
                        'current'        => $balance1->current + $request->input('amount'),
                        'user_id'        => $id,
                        'currency_id'    => $request->input('currency'),
                        'transaction_id' => $transaction1->id,
                        'system_id'      => Auth::user()->system_id,
                        'status'         => true,
                    ]);

                    if ($request->input('email') == 1) {

                        $user = User::where([
                            ['id',  '=', $id],
                            ['system_id', '=', Auth::user()->system_id]
                        ])->first();

                        $record = array(
                            'name'    => $user->name, 
                            'subject' => "Bonus has been sent",
                            'content' => '$'.$request->input('amount'). ' bonus has been successfully sent to your account.'
                        );
            
                        Mail::to($user->email)->send(new NotifyEmail($record));

                    }


                    return Response::json([
                        'status' => 'success',
                        'message'  => 'Transaction have been created successfully!'
                    ]);
                }
            }

            if ($request->input('type') == 3) {

                $transaction1 = Transaction::create([
                    'user_id'      => $id,
                    'type_id'      => 3,
                    'currency_id'  => $request->input('currency'),
                    'plan_id'      => $request->input('deposit') == 0 ? NULL : $request->input('deposit'),
                    'reference'    => Helper::reference(10),
                    'amount'       => $request->input('amount'),
                    'description'  => $request->input('description'),
                    'system_id'    => Auth::user()->system_id,
                    'status_id'    => 1
                ]);

                if ($transaction1) {

                    $balance1 = Balance::where([
                        ['user_id',     '=', $id],
                        ['system_id',   '=', Auth::user()->system_id],
                        ['status',      '=', true]
                    ])->first();

                    Balance::where([
                        ['user_id',     '=', $id],
                        ['system_id',   '=', Auth::user()->system_id],
                        ['status',      '=', true]
                    ])->update(['status' => false]);

                    Balance::create([
                        'previous'       => $balance1->current,
                        'current'        => $balance1->current + $request->input('amount'),
                        'user_id'        => $id,
                        'currency_id'    => $request->input('currency'),
                        'transaction_id' => $transaction1->id,
                        'system_id'      => Auth::user()->system_id,
                        'status'         => true,
                    ]);

                    if ($request->input('email') == 1) {

                        $user = User::where([
                            ['id',  '=', $id],
                            ['system_id', '=', Auth::user()->system_id]
                        ])->first();

                        $record = array(
                            'name'    => $user->name, 
                            'subject' => "Earning has been sent",
                            'content' => '$'.$request->input('amount'). ' earning has been successfully sent to your account.'
                        );
            
                        Mail::to($user->email)->send(new NotifyEmail($record));

                    }

                    return Response::json([
                        'status' => 'success',
                        'message'  => 'Transaction have been created successfully!'
                    ]);
                }
            }

            if ($request->input('type') == 4) {

                $balance1 = Balance::where([
                    ['user_id',   '=', $id],
                    ['system_id', '=', Auth::user()->system_id],
                    ['status',    '=', true]
                ])->first();

                if ($balance1->current >= $request->input('amount')) {

                    $transaction1 = Transaction::create([
                        'user_id'      => $id,
                        'type_id'      => 4,
                        'currency_id'  => $request->input('currency'),
                        'plan_id'      => $request->input('deposit') == 0 ? NULL : $request->input('deposit'),
                        'reference'    => Helper::reference(10),
                        'amount'       => $request->input('amount'),
                        'description'  => $request->input('description'),
                        'system_id'    => Auth::user()->system_id,
                        'status_id'    => 1
                    ]);

                    if ($transaction1) {

                        Balance::where([
                            ['user_id',     '=', $id],
                            ['system_id',   '=', Auth::user()->system_id],
                            ['status',      '=', true]
                        ])->update(['status' => false]);

                        Balance::create([
                            'previous'       => $balance1->current,
                            'current'        => $balance1->current - $request->input('amount'),
                            'user_id'        => $id,
                            'currency_id'    => $request->input('currency'),
                            'transaction_id' => $transaction1->id,
                            'system_id'      => Auth::user()->system_id,
                            'status'         => true,
                        ]);

                        if ($request->input('email') == 1) {

                            $user = User::where([
                                ['id',  '=', $id],
                                ['system_id', '=', Auth::user()->system_id]
                            ])->first();

                            $currency = Currency::where([
                                ['id',  '=', $request->input('currency')],
                                ['system_id', '=', Auth::user()->system_id]
                            ])->first();
    
                            $record = array(
                                'name'    => $user->name, 
                                'subject' => "Withdrawal has been sent",
                                'content' => '$'.$request->input('amount'). ' has been successfully sent to your '.$currency->name.' account. Transaction batch is f304602c43842aecb64a2a5f22fb2348ea3dc5608b0b32bb7d9d87052431e526.'
                            );
                
                            Mail::to($user->email)->send(new NotifyEmail($record));
    
                        }
    

                        return Response::json([
                            'status' => 'success',
                            'message'  => 'Transaction have been created successfully!'
                        ]);
                    }
                } else {

                    return Response::json([
                        'status' => 'error1',
                        'message' => 'Insufficient balance in user account!'
                    ]);
                }
            }

            if ($request->input('type') == 5) {

                $transaction1 = Transaction::create([
                    'user_id'      => $id,
                    'type_id'      => 5,
                    'currency_id'  => $request->input('currency'),
                    'plan_id'      => $request->input('deposit') == 0 ? NULL : $request->input('deposit'),
                    'reference'    => Helper::reference(10),
                    'amount'       => $request->input('amount'),
                    'description'  => $request->input('description'),
                    'system_id'    => Auth::user()->system_id,
                    'status_id'    => 1
                ]);

                if ($transaction1) {

                    $balance1 = Balance::where([
                        ['user_id',     '=', $id],
                        ['system_id',   '=', Auth::user()->system_id],
                        ['status',      '=', true]
                    ])->first();

                    Balance::where([
                        ['user_id',     '=', $id],
                        ['system_id',   '=', Auth::user()->system_id],
                        ['status',      '=', true]
                    ])->update(['status' => false]);

                    Balance::create([
                        'previous'       => $balance1->current,
                        'current'        => $balance1->current + $request->input('amount'),
                        'user_id'        => $id,
                        'currency_id'    => $request->input('currency'),
                        'transaction_id' => $transaction1->id,
                        'system_id'      => Auth::user()->system_id,
                        'status'         => true,
                    ]);

                    if ($request->input('email') == 1) {

                        $user = User::where([
                            ['id',  '=', $id],
                            ['system_id', '=', Auth::user()->system_id]
                        ])->first();

                        $record = array(
                            'name'    => $user->name, 
                            'subject' => "Referral Commission has been sent",
                            'content' => '$'.$request->input('amount'). ' referral commission has been successfully sent to your account.'
                        );
            
                        Mail::to($user->email)->send(new NotifyEmail($record));

                    }

                    return Response::json([
                        'status' => 'success',
                        'message'  => 'Transaction have been created successfully!'
                    ]);
                }
            }

            if ($request->input('type') == 6) {

                $balance1 = Balance::where([
                    ['user_id',   '=', $id],
                    ['system_id', '=', Auth::user()->system_id],
                    ['status',    '=', true]
                ])->first();

                if ($balance1->current >= $request->input('amount')) {

                    $transaction1 = Transaction::create([
                        'user_id'      => $id,
                        'type_id'      => 6,
                        'currency_id'  => $request->input('currency'),
                        'plan_id'      => $request->input('deposit') == 0 ? NULL : $request->input('deposit'),
                        'reference'    => Helper::reference(10),
                        'amount'       => $request->input('amount'),
                        'description'  => $request->input('description'),
                        'system_id'    => Auth::user()->system_id,
                        'status_id'    => 3
                    ]);

                    if ($request->input('email') == 1) {

                        $user = User::where([
                            ['id',  '=', $id],
                            ['system_id', '=', Auth::user()->system_id]
                        ])->first();

                        $record = array(
                            'name'    => $user->name, 
                            'subject' => "Withdrawal Request has been sent",
                            'content' => 'Withdrawal Request has been successfully sent to your account.'
                        );
            
                        Mail::to($user->email)->send(new NotifyEmail($record));

                    }

                    return Response::json([
                        'status' => 'success',
                        'message'  => 'Transaction have been created successfully!'
                    ]);

                } else {

                    return Response::json([
                        'status' => 'error1',
                        'message' => 'Insufficient balance in user account!'
                    ]);
                }
            }
            
        } else {

            return Response::json([
                'status' => 'error1',
                'message'  => 'Incorrect admin password!'
            ]);
        }
    }

    /**
     * Show the application earnings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function transactions()
    {
        $title = "Transactions";

        $transactions = Transaction::where([
            ['system_id', '=', Auth::user()->system_id],
        ])->with(['type','currency','status'])->orderBy('id', 'desc')->get();

        return view('admin.history.transactions', [
            'title'        => $title,
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the application settings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $title = "Profile Information";

        $admin = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $referral = Referral_Setting::where([
            ['system_id', '=', Auth::user()->system_id]
        ])->first();
        
        return view('admin.settings.profile', [
            'title'    => $title,
            'admin'    => $admin,
            'referral' => $referral
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        $saved = User::where([
            ['id', Auth::id()],
            ['system_id', Auth::user()->system_id]
        ])->update([
            'name' => $request->input('name')
        ]);

        if($saved) {
            return Response::json([
                'status'  => 'success',
                'message' => 'Profile has been updated successfully'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateReferralSettings(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'percent' => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        $referral = Referral_Setting::where([
            ['system_id', Auth::user()->system_id]
        ])->update([
            'name'    => $request->input('name'),
            'percent' => $request->input('percent')
        ]);

        if($referral) {
            return Response::json([
                'status'  => 'success',
                'message' => 'Referral setting has been updated successfully'
            ]);
        }
    }

    /**
     * Show the application settings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function company()
    {
        $title = "Company Information";

        $company = System::where([
            ['id', '=', Auth::user()->system_id]
        ])->first();

        $admin = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();
        
        return view('admin.settings.company', compact('title','company','admin'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCompany(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'website'   => 'required',
            'address'   => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'facebook'  => 'required',
            'twitter'   => 'required',
            'instagram' => 'required',
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        $updated = System::where([
            ['id', Auth::user()->system_id]
        ])->update([
            'name'      => $request->input('name'),
            'url'       => $request->input('website'),
            'address'   => $request->input('address'),
            'email'     => $request->input('email'),
            'phone'     => $request->input('phone'),
            'facebook'  => $request->input('facebook'),
            'twitter'   => $request->input('twitter'),
            'instagram' => $request->input('instagram')
        ]);

        if($updated) {
            return Response::json([
                'status'  => 'success',
                'message' => 'Company has been updated successfully'
            ]);
        }
    }

    /**
     * Show the application settings.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function statistics()
    {
        $title = "Statistics Information";

        $statistics = Statistics::where([
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $admin = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();
        
        return view('admin.settings.statistics', [
            'title'      => $title,
            'admin'      => $admin,
            'statistics' => $statistics
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatistics(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'transactions' => 'required',
            'countries'    => 'required',
            'investors'    => 'required',
            'feedbacks'    => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        $updated = Statistics::where([
            ['id', Auth::user()->system_id]
        ])->update([
            'transactions' => $request->input('transactions'),
            'countries'    => $request->input('countries'),
            'investors'    => $request->input('investors'),
            'feedbacks'    => $request->input('feedbacks')
        ]);

        if($updated) {
            return Response::json([
                'status'  => 'success',
                'message' => 'Company has been updated successfully'
            ]);
        }
    }
}

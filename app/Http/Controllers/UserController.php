<?php

namespace App\Http\Controllers;

use Helper;
use Response;
use Validator;
use App\Models\User;
use App\Models\Plan;
use App\Models\Currency;
use App\Models\Balance;
use App\Models\Referral;
use App\Mail\VerifyEmail;
use App\Mail\withdrawEmail;
use App\Models\Referral_Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('role:user');
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Dashboard";

        $user = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $capital = Transaction::where([
            ['user_id', '=', Auth::id()],
            ['type_id', '=', 1],
            ['system_id', '=', Auth::user()->system_id],
            ['status_id', '=', '1']
        ])->sum('amount');

        $balance = Balance::where([
            ['user_id',   '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id],
            ['status', '=', true]
        ])->first();

        $earning = Transaction::where([
            ['user_id', '=', Auth::id()],
            ['type_id', '=', 3],
            ['system_id', '=', Auth::user()->system_id]
        ])->sum('amount');

        $bonus = Transaction::where([
            ['user_id', '=', Auth::id()],
            ['type_id', '=', 2],
            ['system_id', '=', Auth::user()->system_id]
        ])->sum('amount');

        $referral = Transaction::where([
            ['user_id', '=', Auth::id()],
            ['type_id', '=', 5],
            ['system_id', '=', Auth::user()->system_id]
        ])->sum('amount');

        return view('user.main.index', [
            'title'    => $title,
            'user'     => $user,
            'capital'  => $capital,
            'balance'  => $balance,
            'earning'  => $earning,
            'referral' => $referral,
            'bonus'    => $bonus
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deposit()
    {
        $title = "Deposit Plans";

        $commission = Referral_Setting::where([
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $plans = Plan::where([
            ['status', '=', true],
            ['system_id', '=', Auth::user()->system_id]
        ])->get();

        return view('user.main.deposit', [
            'title'      => $title,
            'plans'      => $plans,
            'commission' => $commission
        ]);
    }

    /**
     * Show the application deposit Method.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function depositMethod($id)
    {
        $title = "Deposit Method";

        $plan = Plan::where([
            ['id',        '=', Crypt::decrypt($id)],
            ['status',    '=', true],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $currencies = Currency::where([
            ['status',    '=', true],
            ['system_id', '=', Auth::user()->system_id]
        ])->orderBy('id', 'desc')->get();

        return view('user.main.depositMethod', [
            'title'      => $title,
            'plan'       => $plan,
            'currencies' => $currencies
        ]);
    }

    /**
     * Resturn the currency application response.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function fetchCurrency($id)
    {
        $user = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $currency = Currency::where([
            ['id', '=', $id],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();
        
        return Response::json([
            'status' => 'success',
            'user'   =>  $user,
            'data'   => $currency
        ]);
    }

    /**
     * Create a new resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createDeposit(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'user'     => 'required',
            'address'  => 'required',
            'amount'   => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        $plan = Plan::where('id', '=', $request->input('plan'))->first();
        if ($plan) {
            
            $transaction = Transaction::create([
                'user_id'      => Auth::id(),
                'type_id'      => 1,
                'currency_id'  => $request->input('currency'),
                'plan_id'      => $plan->id,
                'reference'    => Helper::reference(10),
                'amount'       => $request->input('amount'),
                'description'  => 'Deposited to ' .$plan->name.' for '.$plan->percent.'% Profit After '.$plan->duration,
                'system_id'    => Auth::user()->system_id,
                'status_id'    => 3
            ]);

            if ($transaction) {

                return Response::json([
                    'status'  => 'success',
                    'message' => 'Deposit have been created successfully!'
                ]);
            }
        }
    }

    /**
     * Show the application withdraw form.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function withdraw()
    {
        $title = "Withdraw Fund";

        $currencies = Currency::where([
            ['system_id', '=', Auth::user()->system_id],
            ['status', '=', true]
        ])->get();
        
        $balance = Balance::where([
            ['user_id',   '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id],
            ['status', '=', true]
        ])->first();

        return view('user.main.withdraw', [
            'title'      => $title,
            'currencies' => $currencies,
            'balance' => $balance
        ]);
    } 

    /**
     * Create a new resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function withdrawalRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'address'  => 'required',
            'amount'   => 'required'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error1',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        $balance = Balance::where([
            ['user_id',   '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id],
            ['status', '=', true]
        ])->first();

        $amount = floatval($request->input('amount'));

        if ($balance->current >= $amount) {

            $transaction = Transaction::create([
                'user_id'     => Auth::id(),
                'type_id'     => 6,
                'currency_id' => $request->input('currency'),
                'reference'   => Helper::reference(10),
                'amount'      => $amount,
                'address'     => $request->input('address'),
                'description' => 'Withdraw processed to account ' .$request->input('address'),
                'system_id'   => Auth::user()->system_id,
                'status_id'   => 3,
            ]);

            if ($transaction) {

                $record = array(
                    'name'    => Auth::user()->name, 
                    'subject' => "Withdrawal Request has been sent",
                    'content' => 'You have requested to withdraw $'.$request->input('amount').'.',
                    'IP'      => 'Request IP address is ' . \Request::ip()
                );
    
                Mail::to(Auth::user()->email)->send(new withdrawEmail($record));

                return Response::json([
                    'status'  => 'success',
                    'message' => 'Awesome, your withdrawal is on the way!',
                ]);
            }

        } else {

            return Response::json([
                'status'  => 'error2',
                'message' => 'Insuficient amount in your balance!'
            ]);
        }

    }

    /**
     * Show the application transaction history.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function transactions()
    {
        $title = "Transactions";

        $transactions = Transaction::where([
            ['user_id',   '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->with(['type','currency','status'])->orderBy('id', 'desc')->get();
        
        return view('user.history.transactions', [
            'title'    => $title,
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the application profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        $title = "Profile";

        $user = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        return view('user.settings.profile', [
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

        $updated = User::where([
            ['id', Auth::id()],
            ['system_id', Auth::user()->system_id]
        ])->update([
            'name' => $request->input('name')
        ]);

        if($updated) {
            return Response::json([
                'status'  => 'success',
                'message' => 'Profile has been updated successfully'
            ]);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function referrals()
    {
        $title = "Referrals";

        $user = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        $referrals = Referral::where([
            ['refererUsername', '=', $user->username],
            ['system_id', '=', Auth::user()->system_id]
        ])->with(['user','status'])->get();

        $commission = Transaction::where([
            ['user_id', '=', Auth::id()],
            ['type_id', '=', 5],
            ['system_id', '=', Auth::user()->system_id]
        ])->sum('amount');

        return view('user.settings.referrals', [
            'title' => $title,
            'user'  => $user,
            'referrals' => $referrals,
            'commission' => $commission
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changePassword()
    {
        $title = "Profile";

        $user = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        return view('user.settings.changePassword', [
            'title' => $title,
            'user'  => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePasswordUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'     => 'required|min:5',
            'new_password'         => 'required|min:5',
            'confirm_new_password' => 'required|min:5'
        ]);

        if($validator->fails()) {
            return Response::json([
                'status' => 'error1',
                'errors' =>$validator->errors()->toArray()
            ]);
        }

        $user = User::where([
            ['id', '=', Auth::id()],
            ['system_id', '=', Auth::user()->system_id]
        ])->first();

        if ($user) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                if ($request->input('new_password') == $request->input('confirm_new_password')) {

                    User::where([
                        ['id', Auth::id()],
                        ['system_id', '=', Auth::user()->system_id]
                    ])->update([
                        'password' => Hash::make($request->input('new_password'))
                    ]);
                
                    return Response::json([
                        'status' => 'success',
                        'message' => 'Password has been updated successfully'
                    ]);
                } else {
                    return Response::json([
                        'status' => 'error',
                        'message' => 'New password and confirm password does not match'
                    ]);
                }
            } else {
                return Response::json([
                    'status' => 'error',
                    'message' => 'Incorrect current password'
                ]);
            }
        } else {
            return Response::json([
                'status' => 'error',
                'message' => 'User account not found!'
            ]);
        }
    }

    /**
     * Verify User Account Email.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function processVerifyEmail($token)
    {
        $decryptToken = Crypt::decrypt($token);

        if ($decryptToken) {

            $user = User::where([
                ['id', '=', $decryptToken],
                ['system_id', '=', Auth::user()->system_id]
            ])->update([
                'email_verified_at' => now()
            ]);

            if ($user) {

                return redirect('/user/dashboard')->with('success', 'Your email has been verified successfully');
            } else {

                return redirect('/user/dashboard')->with('fails', 'We were not able to verify your email');
            }
        } else {

            return redirect('/user/dashboard')->with('fails', 'We were not able to verify your email');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function resendEmail($id)
    {
        $user = User::where('id', '=', $id)->first();
        
        $record = array(
            'username' => $user->username, 
            'subject'  => "Activate Your Account",
            'url'      => env('APP_URL').'/user/email/verify/'. Crypt::encrypt($user->id)
        );

        Mail::to($user->email)->send(new VerifyEmail($record));

        return Response::json([
            'status'  => 'success',
            'message' => 'Something went wrong, try again later!'
        ]);
    }
}



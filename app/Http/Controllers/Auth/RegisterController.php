<?php

namespace App\Http\Controllers\Auth;

use Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Mail\VerifyEmail;
use App\Models\Currency;
use App\Models\Balance;
use App\Models\Referral;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'string', 'max:255', 'unique:users'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'      => $data['name'],
            'username'  => $data['username'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'system_id' => 1,
            'status'    => 'Active'
        ]);

        if($user) {

            Balance::create([
                'previous'       => 0.00,
                'current'        => 0.00,
                'user_id'        => $user->id,
                'transaction_id' => null,
                'system_id'      => 1,
                'status'         => true,
            ]);

            if (isset($data['referrer'])) {

                $referrer = User::where('username', '=', $data['referrer'])->first();

                if ($referrer) {
                    Referral::create([
                        'user_id'         => $user->id,
                        'refererUsername' => $data['referrer'],
                        'system_id'       => 1,
                    ]);
                }
            }

            $record = array(
                'username' => $data['username'], 
                'subject'  => "Activate Your Account",
                'url'      => env('APP_URL').'/user/email/verify/'. Crypt::encrypt($user->id)
            );

            $user->attachRole('user');

            Mail::to($data['email'])->send(new VerifyEmail($record));

            return $user;

        } else {

            return Response::json([
                'status'  => 'error',
                'message' => 'Something went wrong, try again later!'
            ]);

        }
    }
}

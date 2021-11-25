<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Statistics;
use App\Models\Transaction;
use App\Models\Referral_Setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application welcome.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Home";

        $plans = Plan::where([
            ['system_id', '=', 1],
        ])->get();

        $commission = Referral_Setting::where([
            ['system_id', '=', 1],
        ])->first();

        $latestDeposits = Transaction::where([
            ['type_id', '=', 1],
            ['system_id', '=', 1],
        ])->with(['type','currency','status'])->orderBy('id', 'desc')->take(5)->get();

        $latestWithdrawals = Transaction::where([
            ['type_id', '=', 4],
            ['system_id', '=', 1],
        ])->with(['type','currency','status'])->orderBy('id', 'desc')->take(5)->get();

        $statistics = Statistics::where([
            ['system_id', '=', 1]
        ])->first();

        return view('landing.welcome', [
            'title' => $title,
            'plans' => $plans,
            'commission' => $commission,
            'statistics' => $statistics,
            'latestDeposits' => $latestDeposits,
            'latestWithdrawals' => $latestWithdrawals
        ]);
    }

    /**
     * Show the application about.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        $title = "About";

        return view('landing.about', [
            'title' => $title
        ]);
    }

    /**
     * Show the application howitwork.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function howItWork()
    {
        $title = "How It Work";

        return view('landing.howItWork', [
            'title' => $title
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

        $commission = Referral_Setting::where([
            ['system_id', '=', 1],
        ])->first();

        $plans = Plan::where([
            ['system_id', '=', 1],
        ])->get();

        return view('landing.plans', [
            'title'      => $title,
            'plans'      => $plans,
            'commission' => $commission
        ]);
    }

    /**
     * Show the application faq.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faq()
    {
        $title = "FAQ"; 

        return view('landing.faq', [
            'title' => $title
        ]);
    }

    /**
     * Show the application contact.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        $title = "Contact";

        return view('landing.contact', [
            'title' => $title
        ]);
    }
}

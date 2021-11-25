<?php

namespace App\Console\Commands;

use Helper;
use App\Models\Transaction;
use App\Models\Balance;
use App\Models\Plan;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CreateEarning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:earning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create users earning transactions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // \Log::info("Cron is working fine!");

        $transaction1 = Transaction::whereDate('created_at', Carbon::now()->subHours(24))->where([
            ['system_id',  '=', 1],
            ['type_id',    '=', 1],
            ['plan_id',    '=', 1],
            ['status_id',  '=', 1]
        ])->get();

        if ($transaction1) {

            for($i = 0; $i<$transaction1->count(); $i++)
            {
                $plan = Plan::where([
                    ['id', '=', $transaction1[$i]->plan_id],
                    ['status', '=', true],
                    ['system_id', '=', $transaction1[$i]->system_id]
                ])->first();

                $bonus = ($plan->percent/100)*$transaction1[$i]->amount;

                $task1 = Transaction::create([
                    'user_id'      => $transaction1[$i]->user_id,
                    'type_id'      => 3,
                    'currency_id'  => $transaction1[$i]->currency_id,
                    'plan_id'      => $transaction1[$i]->plan_id,
                    'reference'    => Helper::reference(10),
                    'amount'       => $bonus,
                    'description'  => 'Earned a bonus of ' .$bonus,
                    'system_id'    => $transaction1[$i]->system_id,
                    'status_id'    => 1
                ]);
                if ($task1) {
                    
                    $balance = Balance::where([
                        ['user_id',     '=', $transaction1[$i]->user_id],
                        ['system_id',   '=', $transaction1[$i]->system_id],
                        ['status',      '=', true]
                    ])->first();
    
                    Balance::where([
                        ['user_id',     '=', $transaction1[$i]->user_id],
                        ['system_id',   '=', $transaction1[$i]->system_id],
                        ['status',      '=', true]
                    ])->update(['status' => false]);
    
                    Balance::create([
                        'previous'       => $balance->current,
                        'current'        => $balance->current + $bonus,
                        'user_id'        => $transaction1[$i]->user_id,
                        'transaction_id' => $task1->id,
                        'system_id'      => $transaction1[$i]->system_id,
                        'status'         => true,
                    ]);
                }
            }
        }

        $transaction2 = Transaction::whereDate('created_at', Carbon::now()->subHours(48))->where([
            ['system_id',  '=', 1],
            ['type_id',    '=', 1],
            ['status_id',  '=', 1]
        ])->get();

        if ($transaction2) {

            for($i = 0; $i<$transaction2->count(); $i++)
            {
                $plan = Plan::where([
                    ['id', '=', $transaction2[$i]->plan_id],
                    ['status', '=', true],
                    ['system_id', '=', $transaction2[$i]->system_id]
                ])->first();

                $bonus = ($plan->percent/100)*$transaction2[$i]->amount;

                $task2 = Transaction::create([
                    'user_id'      => $transaction2[$i]->user_id,
                    'type_id'      => 3,
                    'currency_id'  => $transaction2[$i]->currency_id,
                    'plan_id'      => $transaction2[$i]->plan_id,
                    'reference'    => Helper::reference(10),
                    'amount'       => $bonus,
                    'description'  => 'Earned a bonus of ' .$bonus,
                    'system_id'    => $transaction2[$i]->system_id,
                    'status_id'    => 1
                ]);
                if ($task2) {
                    
                    $balance = Balance::where([
                        ['user_id',     '=', $transaction2[$i]->user_id],
                        ['system_id',   '=', $transaction2[$i]->system_id],
                        ['status',      '=', true]
                    ])->first();
    
                    Balance::where([
                        ['user_id',     '=', $transaction2[$i]->user_id],
                        ['system_id',   '=', $transaction2[$i]->system_id],
                        ['status',      '=', true]
                    ])->update(['status' => false]);
    
                    Balance::create([
                        'previous'       => $balance->current,
                        'current'        => $balance->current + $bonus,
                        'user_id'        => $transaction2[$i]->user_id,
                        'transaction_id' => $task2->id,
                        'system_id'      => $transaction2[$i]->system_id,
                        'status'         => true,
                    ]);
                }
            }
        }

        $transaction3 = Transaction::whereDate('created_at', Carbon::now()->subHours(72))->where([
            ['system_id',  '=', 1],
            ['type_id',    '=', 1],
            ['plan_id',    '=', 1],
            ['status_id',  '=', 1]
        ])->get();

        if ($transaction3) {

            for($i = 0; $i<$transaction3->count(); $i++)
            {
                $plan = Plan::where([
                    ['id', '=', $transaction3[$i]->plan_id],
                    ['status', '=', true],
                    ['system_id', '=', $transaction3[$i]->system_id]
                ])->first();

                $bonus = ($plan->percent/100)*$transaction3[$i]->amount;

                $task3 = Transaction::create([
                    'user_id'      => $transaction3[$i]->user_id,
                    'type_id'      => 3,
                    'currency_id'  => $transaction3[$i]->currency_id,
                    'plan_id'      => $transaction3[$i]->plan_id,
                    'reference'    => Helper::reference(10),
                    'amount'       => $bonus,
                    'description'  => 'Earned a bonus of ' .$bonus,
                    'system_id'    => $transaction3[$i]->system_id,
                    'status_id'    => 1
                ]);
                if ($task3) {
                    
                    $balance = Balance::where([
                        ['user_id',     '=', $transaction3[$i]->user_id],
                        ['system_id',   '=', $transaction3[$i]->system_id],
                        ['status',      '=', true]
                    ])->first();
    
                    Balance::where([
                        ['user_id',     '=', $transaction3[$i]->user_id],
                        ['system_id',   '=', $transaction3[$i]->system_id],
                        ['status',      '=', true]
                    ])->update(['status' => false]);
    
                    Balance::create([
                        'previous'       => $balance->current,
                        'current'        => $balance->current + $bonus,
                        'user_id'        => $transaction3[$i]->user_id,
                        'transaction_id' => $task3->id,
                        'system_id'      => $transaction3[$i]->system_id,
                        'status'         => true,
                    ]);
                }
            }
        }
      
        // $this->info('create:earning Command Run successfully!');
    }
}


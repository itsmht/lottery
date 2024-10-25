<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeductBalanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'balance:deduct';

    protected $description = 'Deduct balance from a user account.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = DB::table('subscriptions')
            ->join('users', 'subscriptions.user_id', '=', 'users.user_id')
            ->join('packages', 'subscriptions.package_id', '=', 'packages.package_id')
            ->select('users.user_id', 'users.balance', 'packages.daily_income', 'packages.validity as pVal', 'subscriptions.validity as sVal')
            ->where('subscriptions.validity', '>=', 0)
            ->get();

        foreach ($users as $user)
        {
            // Deduct $25 from user's balance

            if($user->sVal >= $user->pVal)
            {
                $newValidity = $user->sVal;
                $newBalance = $user->balance;
            }
            else
            {
                $newValidity = $user->sVal + 1;
                if($user->balance == 0)
                {
                    $newBalance = 0;
                }
                else
                {
                    if($user->balance - $user->daily_income <= 0)
                    {
                        $newBalance = 0;
                    }
                    else
                    {
                        $newBalance = $user->balance - $user->daily_income;

                    }

                }
            }
            // Update the user's balance in the database
            DB::table('users')
                ->where('user_id', $user->user_id)
                ->update(['balance' => $newBalance]);
            DB::table('subscriptions')
                ->where('user_id', $user->user_id)
                ->update([
                    'validity' => $newValidity,
                ]);
        }
    }

}

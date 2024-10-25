<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AddBalanceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'balance:add';

    protected $description = 'Add balance to a user\'s account.';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';

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
            ->select('users.user_id', 'users.balance', 'packages.daily_income' ,'subscriptions.validity', 'packages.package_id')
            ->where('subscriptions.validity', '>', 0)
            ->get();

        foreach ($users as $user)
        {
            // Add $25 to user's balance
            $newBalance = $user->balance + $user->daily_income;
            if($user->validity == 0)
            {
                $newValidity = 0;
            }
            else
            {
                $newValidity = $user->validity - 1;
            }
            // Update the user's balance in the database
            DB::table('users')
                ->where('user_id', $user->user_id)
                ->update(['balance' => $newBalance]);
            DB::table('subscriptions')
                ->where('user_id', $user->user_id)
                ->where('package_id', $user->package_id)
                ->update([
                    'validity' => $newValidity,
                ]);
        }
    }

}

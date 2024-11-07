<?php

namespace App\Http\Controllers;
use App\Models\ReferCodes;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Package;
use App\Models\Scheme;
use App\Models\Subscription;
use App\Models\Purchase;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
class UserController extends Controller
{
    function dashboard()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        if($user)
        {
            return view('user.home')
                ->with('user',$user);
        }
        else
        {
            return view('user.home');
        }
    }
    function withdrawRequest()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        if($user)
        {
            return view('user.withdrawalReq')
                ->with('user',$user);
        }
        else
        {
            return view('user.withdrawalReq');
        }
    }
    function withdrawSubmit(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $method = $req->type;
        $transaction = Transaction::where('user_id',$req->user_id)->where('transaction_type', 'Withdraw')->where('transaction_status', 'Pending')->first();
        if($user && $user->security_code==$req->security_code)
        {
            if($transaction)
            {
                return back()->with('message','You have already submitted a withdraw request. Wait for the admin to approve it.');
            }
            else
            {
                if($user->balance >= $req->amount)
                {

                    $transaction = new Transaction();
                    $transaction->user_id = $req->user_id;
                    $transaction->uniqueTID  = Str::random(8);
                    if($method == "binance")
                    {
                        $transaction->binance_id = "Binance ID: ".$req->credential;
                    }
                    else if($method == "bkash")
                    {
                        $transaction->binance_id = "Bkash Number: ".$req->credential;
                    }
                    else
                    {
                        $transaction->binance_id = "Nagad Number: ".$req->credential;
                    }
                    $transaction->transaction_amount = $req->amount;
                    $transaction->transaction_type = "Withdraw";
                    $transaction->transaction_status = "Pending";
                    $transaction->save();
                    Alert::success('Congrats', 'Your Withdraw Request is Submitted');
                    return back();
                }
                else
                {
                    return back()->with('message','Insufficient Balance');
                }
            }


        }
        else
        {
            return back()->with('message','Security Code did not match!');
        }

    }
    function recharge()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        if($user)
        {
            return view('user.recharge')
                ->with('user',$user);
        }
        else
        {
            return view('user.recharge');
        }
    }
    function rechargeSubmit(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $method = $req->type;
        $transaction = Transaction::where('user_id',$req->user_id)->where('transaction_type', 'Recharge')->where('transaction_status', 'Pending')->first();
        if($user)
        {
            if($transaction)
            {
                return back()->with('message','You have already submitted a recharge request. Wait for the admin to approve it.');
            }
            else
            {
                    $transaction = new Transaction();
                    $transaction->user_id = $req->user_id;
                    $transaction->trans = $req->trans;
                    $transaction->uniqueTID  = Str::random(8);
                    if($method == "binance")
                    {
                        $transaction->binance_id = "Binance ID: ".$req->credential;
                    }
                    else if($method == "bkash")
                    {
                        $transaction->binance_id = "Bkash Number: ".$req->credential;
                    }
                    else if($method == "bank")
                    {
                         $transaction->binance_id = "Bank Account: ".$req->credential;
                    }
                    else
                    {
                        $transaction->binance_id = "Nagad Number: ".$req->credential;
                    }
                    $transaction->transaction_amount = $req->amount;
                    $transaction->transaction_type = "Recharge";
                    $transaction->transaction_status = "Pending";
                    $transaction->save();
                    Alert::success('Congrats', 'Your Recharge Request is Submitted');
                    return back();
            }
        }
        else
        {
            return back();
        }
    }
    function invest(Request $req)
    {
        $user = User::where('user_id', $req->user_id)->first();
        $package = Package::where('package_id', $req->package_id)->first();
        $transaction = Subscription::where('user_id', $req->user_id)->first();
        //$transaction = Subscription::where('user_id', $req->user_id)->where('package_id',$req->package_id)->first();
        if($user->balance<$package->deposit_money)
        {
            return back()->with('message','Insufficient Money');
        }
        else
        {
            if($transaction)
            {
                return back()->with('message','You already inevested in one package. Wait for the package to expire.');
            }
            else
            {
                $subscription = new Subscription();
                $subscription->user_id = $req->user_id;
                $subscription->package_id = $req->package_id;
                $subscription->validity = $package->validity;
                //dd($subscription);
                $subscription->save();
                $user->balance = $user->balance - $package->deposit_money;

                $user->save();
                /*$validity = Carbon::now()->addDays($package->validity);
                for ($i = 0; $i < $package->validity; $i++)
                {
                    $delay = $validity->addDays($i)->format('Y-m-d');
                    $command = "balance:add {$user->id} {$package->daily_income}";
                    Artisan::call("schedule:command $command --date={$delay}");
                }*/

                return back()->with('message', 'Investment successful');
            }

        }



    }
    function userProfile()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $currentPackage = Subscription::where('user_id', $user->user_id)->where('validity', '>', 0)->first();
        return view('user.userProfile')
            ->with('user', $user)
            ->with('currentPackage', $currentPackage);
    }
    function editUserProfile(Request $req)
    {
        $validation = $req->validate(
            [
                'email'=>'unique:users',
                'image'=>'mimes:jpg,png,jpeg',
            ],
            [
                'email.unique'=>'This email already Exists',
                'image.mimes'=>'Only JPG, PNG and JPEG files are allowed',
            ]
        );
        $user = User::where('phone',session()->get('logged'))->first();
        $user->name = $req->name;
        //$user->email = $req->email;
        //$user->phone = $req->phone;
        $user->password = $req->password;
        $user->balance = $req->balance;

        if($req->image)
        {
            $file_name = $user->uniqueId.time().".".$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move(public_path('user_images'),$file_name);
            $user->image = $file_name;
        }
        $user->save();
        return back()->with('message','Profile Updated Successfully');
    }
    function userTransactions()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $transactions = Transaction::where('user_id', $user->user_id)->get();
        return view('user.userTransactions')
            ->with('transactions', $transactions);
    }
    function userRefer(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $refer = ReferCodes::where('user_id', $user->user_id)->latest()->first();

        return view('user.userRefer')
            ->with('user', $user)
            ->with('refer', $refer);
    }
    function userReferSubmit(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
            $refer2 = new ReferCodes();
            $refer2->user_id = $req->user_id;
            $refer2->code = $req->code;
            $refer2->status = "1";
            $refer2->save();
            return back()->with('message','Refer Code Added Successfully');


    }
    /*function userReferSubmit(Request $req)
    {
        $user = User::where('phone', session()->get('logged'))->first();
        $refer = ReferCodes::where('user_id', $user->user_id)->first();
        if ($refer !== null)
        {
            $refer->code = $req->code;
            $refer->user_id = $user->user_id;
            $refer->status = "1";
            $refer->save();
            return back()->with('message', 'Refer Code Updated Successfully');

        }
        else
        {
            $refer2 = new ReferCodes();
            $refer2->user_id = $req->user_id;
            $refer2->code = $req->code;
            $refer->status = "1";
            $refer2->save();
            return back()->with('message', 'Refer Code Added Successfully');

        }
    }*/


    function inside(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $scheme = Scheme::where('scheme_id', $req->id)->first();
        return view('user.inside')->with('scheme',$scheme)->with('user',$user);
    }
    function buyLottery(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $purchase = new Purchase;
        $purchase->picked_number = $req->picked_number;
        $purchase->scheme_id = $req->scheme_id;
        $purchase->user_id = $user->user_id;
        $purchase->bkash = $req->bkash;
        $purchase->status = "3";
        $purchase->save();
        Alert::success('Congrats', 'You have successfully bought the lottery!');
        return back();
    }
    function insideResult(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $scheme = Scheme::where('scheme_id', $req->id)->first();
        $anns = Announcement::where('scheme_id', $req->id)->where('status', '1')->paginate(6);
        return view('user.insideResult')->with('scheme',$scheme)->with('user',$user)->with('anns', $anns);
    }
    
}

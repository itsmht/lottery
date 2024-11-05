<?php

namespace App\Http\Controllers;
use App\Models\ReferCodes;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    function dashboard()
    {
        $today = Carbon::today()->toDateString();

        $user = User::where('phone',session()->get('logged'))->first();
        $refer = ReferCodes::where('user_id', $user->user_id)->latest()->first();
        

        if($user->type == 2)
        {
        $userCount = DB::table('users AS u')
        ->join('refer_codes AS rc', 'u.user_id', '=', 'rc.user_id')
        ->join('refers AS r', 'rc.refer_code_id', '=', 'r.refer_code_id')
        ->join('users AS a', 'r.user_id', '=', 'a.user_id')
        ->where('a.type', 1)
        ->where('u.user_id', $user->user_id)
        ->count();
        
        $totalBalance = User::where('type', '=', 1)->sum('balance');
        $totalWithdraw = DB::table('transactions AS t')
        ->join('users AS u', 't.user_id', '=', 'u.user_id')
        ->join('refers AS r', 'u.user_id', '=', 'r.user_id')
        ->join('refer_codes AS rc', 'r.refer_code_id', '=', 'rc.refer_code_id')
        ->join('users AS a', 'rc.user_id', '=', 'a.user_id')
        ->where('t.transaction_type', 'Withdraw')
        ->where('t.transaction_status', 'Success')
        ->where('a.user_id','=', $user->user_id)
        ->sum('t.transaction_amount');

        $totalRecharge = DB::table('transactions AS t')
        ->join('users AS u', 't.user_id', '=', 'u.user_id')
        ->join('refers AS r', 'u.user_id', '=', 'r.user_id')
        ->join('refer_codes AS rc', 'r.refer_code_id', '=', 'rc.refer_code_id')
        ->join('users AS a', 'rc.user_id', '=', 'a.user_id')
        ->where('t.transaction_type', 'Recharge')
        ->where('t.transaction_status', 'Success')
        ->where('a.user_id','=', $user->user_id)
        ->sum('t.transaction_amount');

        $totalTransaction = DB::table('transactions AS t')
        ->join('users AS u', 't.user_id', '=', 'u.user_id')
        ->join('refers AS r', 'u.user_id', '=', 'r.user_id')
        ->join('refer_codes AS rc', 'r.refer_code_id', '=', 'rc.refer_code_id')
        ->join('users AS a', 'rc.user_id', '=', 'a.user_id')
        ->where('t.transaction_status', 'Success')
        ->where('a.user_id','=', $user->user_id)
        ->count('*');

        $dailyUserCount = DB::table('users AS u')
        ->join('refer_codes AS rc', 'u.user_id', '=', 'rc.user_id')
        ->join('refers AS r', 'rc.refer_code_id', '=', 'r.refer_code_id')
        ->join('users AS a', 'r.user_id', '=', 'a.user_id')
        ->where('a.type', 1)
        ->where('u.user_id','=', $user->user_id)
        ->whereDate('a.created_at', $today)
        ->count();

        $dailyWithdraw = DB::table('transactions AS t')
        ->join('users AS u', 't.user_id', '=', 'u.user_id')
        ->join('refers AS r', 'u.user_id', '=', 'r.user_id')
        ->join('refer_codes AS rc', 'r.refer_code_id', '=', 'rc.refer_code_id')
        ->join('users AS a', 'rc.user_id', '=', 'a.user_id')
        ->where('t.transaction_type', 'Withdraw')
        ->where('t.transaction_status', 'Success')
        ->where('a.user_id','=', $user->user_id)
        ->whereDate('t.created_at', $today)
        ->sum('t.transaction_amount');

        $dailyRecharge = DB::table('transactions AS t')
        ->join('users AS u', 't.user_id', '=', 'u.user_id')
        ->join('refers AS r', 'u.user_id', '=', 'r.user_id')
        ->join('refer_codes AS rc', 'r.refer_code_id', '=', 'rc.refer_code_id')
        ->join('users AS a', 'rc.user_id', '=', 'a.user_id')
        ->where('t.transaction_type', 'Recharge')
        ->where('t.transaction_status', 'Success')
        ->where('a.user_id','=', $user->user_id)
        ->whereDate('t.created_at', $today)
        ->sum('t.transaction_amount');

        $dailyTransaction = DB::table('transactions AS t')
        ->join('users AS u', 't.user_id', '=', 'u.user_id')
        ->join('refers AS r', 'u.user_id', '=', 'r.user_id')
        ->join('refer_codes AS rc', 'r.refer_code_id', '=', 'rc.refer_code_id')
        ->join('users AS a', 'rc.user_id', '=', 'a.user_id')
        ->where('t.transaction_type', 'Withdraw')
        ->where('a.user_id','=', $user->user_id)
        ->whereDate('t.created_at', $today)
        ->count('*');
        }
        else
        {
        $userCount = User::where('type', '=', 1)->count();
        $totalBalance = User::where('type', '=', 1)->sum('balance');
        $totalWithdraw = Transaction::where('transaction_type', '=', 'Withdraw')->where('transaction_status', '=', 'Success')->sum('transaction_amount');
        $totalRecharge = Transaction::where('transaction_type', '=', 'Recharge')->where('transaction_status', '=', 'Success')->sum('transaction_amount');
        $totalTransaction = Transaction::where('transaction_status', '=', 'Success')->count();
        $dailyUserCount = User::where('type', '=', 1)->whereDate('created_at', $today)->count();
        $dailyWithdraw = Transaction::where('transaction_type', '=', 'Withdraw')->where('transaction_status', '=', 'Success')->whereDate('created_at', $today)->sum('transaction_amount');
        $dailyRecharge = Transaction::where('transaction_type', '=', 'Recharge')->where('transaction_status', '=', 'Success')->whereDate('created_at', $today)->sum('transaction_amount');
        $dailyTransaction = Transaction::where('transaction_status', '=', 'Success')->whereDate('created_at', $today)->count();
        }

        return view('admin.dashboard')
            ->with('user',$user)
            ->with('userCount',$userCount)
            //->with('totalBalance',$totalBalance)
            ->with('totalWithdraw',$totalWithdraw)
            ->with('totalRecharge',$totalRecharge)
            ->with('totalTransaction',$totalTransaction)
            ->with('refer', $refer)
            ->with('dailyUserCount',$dailyUserCount)
            ->with('dailyWithdraw',$dailyWithdraw)
            ->with('dailyRecharge',$dailyRecharge)
            ->with('dailyTransaction',$dailyTransaction);
    }
    function users()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        if ($user->type==2)
        {
            $users = User::join('refers', 'users.user_id', '=', 'refers.user_id')
                ->leftJoin('subscriptions', 'users.user_id', '=', 'subscriptions.user_id')
                ->leftJoin('packages', 'subscriptions.package_id', '=', 'packages.package_id')
                ->select('users.*', 'packages.title as package_title')
                ->unionAll(
                    DB::table('refer_codes')
                        ->join('users', 'users.user_id', '=', 'refer_codes.user_id')
                        ->leftJoin('subscriptions', 'users.user_id', '=', 'subscriptions.user_id')
                        ->leftJoin('packages', 'subscriptions.package_id', '=', 'packages.package_id')
                        ->select('users.*', 'packages.title as package_title')
                )
                ->paginate(10);
            //$refer_codes = ReferCodes::where();
        }
        else
        {
            $users = DB::table('users')
                ->select('users.user_id', 'users.uniqueId', 'users.phone', 'users.balance', 'refer_codes.code', 'packages.title', 'users.status')
                ->leftJoin('refer_codes', 'users.user_id', '=', 'refer_codes.user_id')
                ->leftJoin('subscriptions', 'users.user_id', '=', 'subscriptions.user_id')
                ->leftJoin('packages', 'subscriptions.package_id', '=', 'packages.package_id')
                ->paginate(10);
        }
        //dd($users);

        return view('admin.userList')
            ->with('user',$user)
            ->with('users',$users);
    }
    function searchSubmit(Request $request)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $users = User::where('type','=', 1)->where('phone','like','%'.$request->search.'%')->paginate(10);
        return view('admin.searchList')
            ->with('user',$user)
            ->with('users',$users);
    }
    function searchCompany(Request $req)
    {

        $query = $req->get('query');
        $data = User::where('type' , 1)->where('phone', 'LIKE', '%'. $query. '%')
            ->select('phone')
            ->limit(5)->get();//auto suggest search

        return response()->json($data);
    }
    function details(Request $req)
    {
        $user = User::where('phone', session()->get('logged'))->first();
        $userDetails = User::where('user_id', '=', $req->id)->first();
        $transaction = Transaction::where('user_id', '=', $req->id)->where('transaction_status', '=', "Success")->latest()->first();
        
        return view('admin.details')
            ->with('user',$user)
            ->with('userDetails',$userDetails)
            ->with('transaction', $transaction);
    }
    function editUser(Request $req)
    {
        $user = User::where('user_id', '=', $req->user_id)->first();
        $user->password = $req->password;
        $user->security_code = $req->security_code;
        $user->balance = $req->balance;
        //dd($user);
        $user->save();
        Alert::Success('Congrats', 'User Edited');
        return back();
    }
    function userRecharge(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $userDetails = User::where('user_id', '=', $req->user_id)->first();
        $userDetails->balance = $userDetails->balance + $req->transaction_amount;
        $userDetails->save();
        $transaction = new Transaction;
        $transaction->user_id = $req->user_id;
        $transaction->uniqueTID  = Str::random(8);
        $transaction->transaction_amount = $req->transaction_amount;
        $transaction->transaction_type = 'Recharge';
        $transaction->transaction_status = 'Success';
        $transaction->save();

        Alert::Success('Congrats', 'User Recharged');

        return back();
    }
    function changeStatus(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $company = User::where('user_id', '=', $req->user_id)->first();
        $company->status = $req->status;

        $company->save();//Status change or deactivating a company
        Alert::success('Congrats', 'Company Status Changed');
        // return response()->json(['success'=>'Status changed successfully.']);
        return back();

    }
    function rechargeList()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $recharges = Transaction::where('transaction_type', '=', 'Recharge')->where('transaction_status', '=', 'Pending')->paginate(10);
        return view('admin.rechargeList')
            ->with('user',$user)
            ->with('recharges',$recharges);
    }
    function approveRecharge(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $recharge = Transaction::where('transaction_id', '=', $req->id)->first();
        $recharge->transaction_status = 'Success';
        $recharge->save();
        $userDetails = User::where('user_id', '=', $recharge->user_id)->first();
        $userDetails->balance = $userDetails->balance + $recharge->transaction_amount;
        $userDetails->save();
        Alert::success('Congrats', 'Recharge Approved');
        return back();
    }
    function withdrawList()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $withdraws = Transaction::where('transaction_type', '=', 'Withdraw')->where('transaction_status', '=', 'Pending')->paginate(10);
        return view('admin.withdrawList')
            ->with('user',$user)
            ->with('withdraws',$withdraws);
    }
    function approveWithdraw(Request $req)
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $recharge = Transaction::where('transaction_id', '=', $req->id)->first();
        $recharge->transaction_status = 'Success';
        $recharge->save();
        $userDetails = User::where('user_id', '=', $recharge->user_id)->first();
        $userDetails->balance = $userDetails->balance - $recharge->transaction_amount;
        $userDetails->save();
        Alert::success('Congrats', 'Recharge Approved');
        return back();
    }
    function packages()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $packages = Package::paginate(10);
        return view('admin.packageList')
            ->with('user',$user)
            ->with('packages',$packages);
    }
    function transactionList()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $transactions = Transaction::where('transaction_status', '=', 'Success')->orwhere('transaction_status', '=', 'Cancelled')->paginate(10);
        return view('admin.transactionList')
            ->with('user',$user)
            ->with('transactions',$transactions);
    }
    function cancelTransaction(Request $req)
    {
        $user = User::where('phone', session()->get('logged'))->first();
        $transaction = Transaction::where('transaction_id', $req->id)->first();
        $transaction->transaction_status = "Cancelled";
        $transaction->save();
        Alert::success('Congrats', 'Cancelled');
        return back();
    }
    function schemeList()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $transactions = Scheme::paginate(10);
        return view('admin.schemeList')
            ->with('user',$user)
            ->with('schemes',$transactions);
    }
    function createScheme(Request $req)
    {
        $user = User::where('phone', session()->get('logged'))->first();
        $scheme = new Scheme();
        $scheme->title = $req->title;
        $scheme->price = $req->price;
        $scheme->winning_price = $req->winning_price;
        $scheme->status = "1";
        $scheme->save();
        Alert::success('Congrats', 'Inserted');
        return back();
    }

    function createUser(Request $req)
    {
        $user = User::where('phone', session()->get('logged'))->first();
        $user1 = new \App\Models\User;
        $user1->uniqueId = "user".Str::random(10);
        $user1->name = $req->name;
        $user1->email = $req->email;
        $user1->security_code = $req->security_code;
        $user1->phone = $req->phone;
        $user1->password = $req->password;
        $user1->type = 1;
        $user1->status = 1;
        $user1->save();
        $refer2 = new ReferCodes();
        $refer2->user_id = $user->user_id;
        $refer2->code = random_int(100000, 999999);
        $refer2->status = "1";
        $refer2->save();
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "kJIZ6KznjiJSbxnEVpi5";
        $senderid = "8809617613079";
        
        $data = [
            "api_key" => $api_key,
            "senderid" => $senderid,
            "number" => $req->phone,
            "message" => "Dear ". $req->name.", your account has been created on The Asian Lottery and your password is :". $req->password
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        
        Alert::success('Congrats', 'User Created!');
        return back();
    }
}

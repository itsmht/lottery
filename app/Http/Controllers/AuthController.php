<?php

namespace App\Http\Controllers;

use App\Models\ReferCodes;
use App\Models\Refers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Control;
use App\Models\User;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotMail;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login_new');
    }

    function loginSubmit(Request $req)
    {
        $req->validate(
            [
                'phone' => 'required',
                'password' => 'required',
            ],
            [
                'phone.required' => 'Please Enter Your Phone Number',
                //'email.email' => 'Please Enter A Valid Email Address',
                'password.required' => 'Please Enter Your Password',
            ]

        ); //Validating User Authentication Information
        $user = User::where('phone', $req->phone)->where('password',$req->password)->first(); //Authentication
        if($user)
        {
            if($user->status==1)//Checking If User Status is Active
            {
                if($user->type==1)//Checking User Type, Redirecting To Super Admin Dashboard And Creating Session
                {
                    session()->put('logged', $user->phone);
                    return redirect()->route('home');
                }
                if($user->type==2)//Checking User Type, Redirecting To Admin Dashboard And Creating Session
                {
                    session()->put('logged', $user->phone);
                    return redirect()->route('adminDashboard');
                }
                if($user->type==3)//Checking User Type, Redirecting To Admin Dashboard And Creating Session
                {
                    session()->put('logged', $user->phone);
                    return redirect()->route('adminDashboard');
                }
            }
            else
            {
                return redirect()->route("login")->with('message','Your account is not approved yet!');
            }
        }
        else
        {
            return redirect()->route("login")->with('message','The credentials does not match!');
        }
    }

    function register()
    {
        return view('auth.register_new');
    }

    function registerSubmit(Request $req)
    {
        $req->validate(
            [
                //regex:/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/
                "name"=>"required|max:20",
                //"email"=>"unique:users",
                //"security_code"=>"required|digits_between:6,8",
                'phone'=>'required|numeric|unique:users',
                "password"=>"required|min:8",
                //"password"=>"required|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/",
                "conf_password"=>"required|same:password",


            ],
            [
                "name.required"=> "Please Enter Your Name",
                "name.max"=> "Maximum 20 Characters",
                //"name.regex"=>"Please Enter A Valid Name",
                //"email.email"=>"Please Enter A Valid Email Address",
                //"email.unique"=>"This Email is already registered",
                //"security_code.required"=>"Security Code is required.",
                //"security_code.digits_between"=>"Security Code must be a number and between 6 to 8 numbers.",
                //"security_code.min"=>"Minimum 6 numbers",
                //"security_code.max"=>"Maximum 6 numbers",
                //"email.required"=>"Please Enter Your Email Address",
                "phone.required"=>"Please Enter Your Phone Number",
                "phone.numeric"=>"Your Input is wrong. Please insert your phone numer.",
                "phone.unique"=>"This Phone Number is already registered",
                "password.required"=>"Please Enter A Password",
                "password.min"=>"Minimum 8 Characters",
                //"password.regex"=>"Password must contain a special character, a number and an uppercase letter",
                "conf_password.required"=>"Please Confirm Your Password",
                "conf_password.same"=>"Passwords do not match",

            ]
        );//Validation
        //Taking inputs from user

        $user = new \App\Models\User;
        $user->uniqueId = "user".Str::random(10);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->security_code = 1;
        $user->phone = $req->phone;
        $user->password = $req->password;
        $user->type = 1;
        $user->status = 1;
        $user->save();
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
        $refer2 = new ReferCodes();
        $refer2->user_id = $user->user_id;
        $refer2->code = random_int(100000, 999999);
        $refer2->status = "1";
        $refer2->save();
        if($req->has('refer_code'))
        {
            $referId = ReferCodes::where('code', $req->refer_code)->first();
            if($referId)
            {
                $refer = new Refers();
                $refer->user_id = $user->user_id;
                $refer->refer_code_id = $referId->refer_code_id;
                $refer->save();
                Alert::success('Congrats', 'User Registered Successfully');
                return redirect()->route('login');//Redirected to Login Page
            }
            else
            {
                return redirect()->route("login")->with('message','The refer code did not matched or was intentionally left blank! But, you still can access this site');
            }

        }
        else
        {
            Alert::success('Congrats', 'User Registered Successfully');
            return redirect()->route('login');//Redirected to Login Page
        }



    }
    function logout()
    {
        session()->forget('logged'); //Session destroyed
        session()->flash('msg','Sucessfully Logged out');
        return redirect()->route('home');
    }
    function forgotPassword()
    {
        return view('auth.forgot');
    }
    function forgotPasswordSubmit(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email',
            ],
            [
                'email.required' => 'Please Enter Your Email',
                'email.email' => 'Please Enter A Valid Email Address',
            ]
        );
        $user = User::where('email', $req->email)->first();
        if($user)
        {
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'password' => $user->password,

            ];
            Mail::to($user->email)->send(new ForgotMail($data));
            Alert::success('Congrats', 'Please Check Your Email For Password');
            return redirect()->route('login');//Redirected to Login Page
        }
        else
        {
            return back()->with('message','Requested email not found in our database!');
        }

    }
}

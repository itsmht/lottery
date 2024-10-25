<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\User;

class CommonController extends Controller
{
    function home()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $packages = Package::all();
        if($user)
        {
            return view('user.home')
                ->with('user',$user)
                ->with('packages',$packages);
        }
        else
        {
            return view('user.home')
                ->with('packages',$packages);
        }
    }
    function about()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        if($user)
        {
            return view('user.about')
                ->with('user',$user);
        }
        else
        {
            return view('user.about');
        }


    }
    function packages()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $packages = Package::all();
        if($user)
        {
            return view('user.packages')
                ->with('user',$user)
                ->with('packages',$packages);
        }
        else
        {
            return view('user.packages')
                ->with('packages',$packages);;
        }

    }
    function contact()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        if($user)
        {
            return view('user.contact')
                ->with('user',$user);
        }
        else
        {
            return view('user.contact');
        }
    }
}

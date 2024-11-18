<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Info;
use App\Models\Scheme;

class CommonController extends Controller
{
    function home()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $schemes = Scheme::all();
        if($user)
        {
            return view('user.home')
                ->with('user',$user)
                ->with('schemes', $schemes);
        }
        else
        {
            return view('user.home')
            ->with('schemes', $schemes);
        }
    }
    function play()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $schemes = Scheme::all();
        if($user)
        {
            return view('user.play')
                ->with('user',$user)
                ->with('schemes', $schemes);
        }
        else
        {
            return view('user.play')
            ->with('schemes', $schemes);
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
    
    function contact()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $info = Info::where('info_id',1)->first();
        if($user)
        {
            return view('user.contact')
                ->with('user',$user)
                ->with('info',$info);
        }
        else
        {
            return view('user.contact')
            ->with('info',$info);
        }
    }
    function result()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        $schemes = Scheme::all();
        if($user)
        {
            return view('user.result')
                ->with('user',$user)
                ->with('schemes', $schemes);
        }
        else
        {
            return view('user.result')
            ->with('schemes', $schemes);
        }
    }
    function how()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        if($user)
        {
            return view('user.how')
                ->with('user',$user);
        }
        else
        {
            return view('user.how');
        }
    }
    function rules()
    {
        $user = User::where('phone',session()->get('logged'))->first();
        if($user)
        {
            return view('user.rules')
                ->with('user',$user);
        }
        else
        {
            return view('user.rules');
        }
    }
}

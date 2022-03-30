<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard()
    {
        return view("login");
    }
    public function addTicket()
    {
        return view("addTicket");
    }
    public function loginAuth(Request $request)
    {
        $request->validate([
                'uname'=>'required',
                'password'=>'required'
            ],
            [
                'uname.required'=> 'The User Name field is required',
                'password.required'=> 'The Password field is required'
            ]
        );
        $username = User::where('name','=',$request->get('uname'))->first();
        if(!$username)
        {
            return back()->with('Fail', 'Invalid User Name');
        }else{
            $user = User::where('name','=',$request->get('uname'))
                        ->where('password','=',$request->get('password'))->first();
            if ($user){
                Auth::login($user);
                return redirect()->to('/dashboard');
            }else{
                return back()->with('Fail', 'Incorrect Password');
            }
        }
    }
    public function dashboard()
    {
        return view('dashboard');
    }
}

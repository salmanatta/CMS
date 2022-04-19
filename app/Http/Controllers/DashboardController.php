<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard()
    {
        return view("dashboard");
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
    public function addUser()
    {
        return view('register-User');
    }
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
        ]);
        return redirect()->back()->with('success','User Added Successfully');

    }
}

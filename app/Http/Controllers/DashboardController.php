<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\User;
use App\Models\UserDepartments;
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
    public function userList()
    {
        $users = User::all();
        return view('auth.user-list',compact('users'));
    }
    public function addUser()
    {
        return view('auth.register-User');
    }
    public function createUser(Request $request)
    {
        $request->validate([
            'mrno' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
            'mr_no'=>$request->mrno,
            'designation'=>$request->designation,
        ]);
        return redirect('user-list')->with('success','User Added Successfully');
    }
    public function userDepartment($uId)
    {
        $user = User::where('id',$uId)->first();
        $dept = department::all();
        return view('auth.user-department',compact('dept','user'));
    }
    public function adduserDepartment(Request $request)
    {
        $request->validate(
            [
                'department'=>'required'
            ]
        );
        $checkDept = UserDepartments::where('user_id',$request->userId)->Where('dept_id',$request->department)->first();
        if($checkDept)
        {
            return redirect()->back()->with('success','Department Already Associated');
        }else
        {
            UserDepartments::create([
                    'user_id'=>$request->userId,
                    'dept_id'=>$request->department,
                ]
            );
            return redirect('user-list')->with('success','Department Associate Successfully');
        }
    }
}

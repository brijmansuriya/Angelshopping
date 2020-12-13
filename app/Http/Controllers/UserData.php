<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Register;

class UserData extends Controller
{
    //
    public function userdata(Request $request )
    {
        if(Session::has('email'))
        {
            $userdata = Register::where('email',Session::get('email'))->first();
            return view('userprofile',compact('userdata'));
        }
        return redirect('login');
    }
    public function updatepersonalinfo(Request $request )
    {
        if(Session::has('email'))
        {
            $data = Register::where('email',Session::get('email'))->first();
            $data->firstname = $request->firstname;
            $data->lastname = $request->lastname;
            $data->gender = $request->gender;
            $data->mobileno = $request->mobileno;
            $data->save();
            return redirect('userprofile');
         
         
        }
        return redirect('login');
    }
    public function changepassword(Request $request)
    {
        if(Session::has('email'))
        {
            $data = Register::where('email',Session::get('email'))->first();
            if ($request->oldpassword == $data->password) {
                if ($request->newpassword == $request->conformnewpassword)
                {
                    $data->password = $request->newpassword;
                    $data->save();
                    return redirect('userprofile');
                }
                else
                {
                    Session::flash('error','password and confirm password not match');
                    
                    return redirect('userprofile');
                }
            }
            else{
                
                Session::flash('error','Old Password wrong');
                return redirect('userprofile');
            }
        }
        return redirect('login');
    }

}
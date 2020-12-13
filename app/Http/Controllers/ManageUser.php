<?php

namespace App\Http\Controllers;
use Session;
use App\Register;

use Illuminate\Http\Request;

class ManageUser extends Controller
{
    public function show_user()
    {   
        if(Session::has('adminemail'))
        {
            $show_users=Register::paginate(5);
            // $show_users=Register::all();
            return view('admin.manage_user',compact('show_users'));   
        }
        return redirect('admin/index');
    }
    public function delete_user($user_id)
    {
        $delete_messages = Register::where('user_id',$user_id)->first();
        $delete_messages->delete();
        return redirect('admin/manage_user')->with('message', 'Query Deleted Successfully!');
    }
    // public function count_user()
    // {
    //     $count_user=Register::count();
    //     dd($count_user);
    //     return view('admin.dashboard',compact('count_user'));
    // } 
}

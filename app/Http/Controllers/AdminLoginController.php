<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        $admin = new \App\AdminLogin;
        $email = $request->email;
        $password = $request->password;
        $admin_email = $admin::where('email', '=', $email)->first();
        $admin_password = $admin::where('password', '=', $password)->first();
        if (!$admin_email) 
        {
           Session::flash('message','please check your email');
           return redirect()->back();
        }
        else if (!$admin_password)
        {
            Session::flash('message','please check your password');
            return redirect()->back();
        }
        else
        {
            $request->session()->put('adminemail',$email);           
            return redirect('admin/admindashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function deleteSession(Request $request) 
    {
        $request->session()->forget('adminemail');
        return redirect('admin/index');
    }
    
}

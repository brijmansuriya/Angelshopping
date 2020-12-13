<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('signup');
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
            'firstname' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
            'mobileno' => 'required',
            'email' => 'required|email|unique:register',
            'password' => 'min:6',
            'cmpassword' => 'required_with:password|same:password|min:6'
        ]);
        
        $user = new \App\Register;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->gender = $request->gender;
        $user->mobileno = $request->mobileno;
        $user->email = $request->email;
        $user->password = $request->password;
        if($request->cmpassword == $request->password)
        {
            $user->save();
            Session::flash('message','Registration Successfull!!');
            return redirect('login');
        }
        else
        {
            Session::flash('error','Registration not Successfull!!');
            return redirect('signup');
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
    public function logout(Request $request )
    {
        $request->session()->forget('email');
        $request->session()->forget('user_id');
        return redirect('login');
    }
  
    
}

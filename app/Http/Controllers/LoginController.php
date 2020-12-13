<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Login;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('login');
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
            'password' => 'required|min:6',
        ]);

        $user = new \App\Login;
        $email = $request->input('email');
        $password = $request->input('password');
        $user_email = $user::where('email', '=', $email)->first();
        $user_password = $user::where('password', '=', $password)->first();
        if (!$user_email) 
        {
           Session::flash('message','please check your email');
           return redirect()->back();
        }
        else if (!$user_password)
        {
            Session::flash('message','please check your password');
            return redirect()->back();
        }
        else
        {
            $request->session()->put('email',$email);
            $data = Login::where('email',$email)->first();
            $request->session()->put('user_id',$data->user_id);
            return redirect('/');
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
}

<?php

namespace App\Http\Controllers;
use Session;
use App\Contact_Us;
use Illuminate\Http\Request;

class ContactUs extends Controller
{
    public function contact_us(Request $request)
    {
        $request->validate([
            'c_name' => 'required',
            'c_email' => 'required',
            'c_mobileno' => 'required',
            'c_message' => 'required',
        ]);

        $contact_us = new Contact_Us();
        $contact_us->name = $request->c_name;
        $contact_us->email = $request->c_email;
        $contact_us->mobileno = $request->c_mobileno;
        $contact_us->message = $request->c_message;
        $contact_us->save();

        Session::flash('statuscode','success');
        
        return redirect('contactus')->with('success','Your Query Has Been Send!');
    }
    public function show_message()
    {
        $show_messages = Contact_Us::paginate(5);
    
        return view('admin.customer_review',compact('show_messages'));
    }
    public function delete_message($id)
    {
        $delete_messages = Contact_Us::where('id',$id)->first();
        $delete_messages->delete();
        return redirect('admin/customer_review')->with('message', 'Query Deleted Successfully!');
    }
}

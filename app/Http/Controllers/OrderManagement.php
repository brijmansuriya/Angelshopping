<?php

namespace App\Http\Controllers;
use DB;
use Session;
use App\Add_Product;
use App\Add_Cart;
use App\Orders_Detail;
use App\Order_Masters;
use Illuminate\Http\Request;

class OrderManagement extends Controller
{
    public function checkout(Request $request)
    {
        if(Session::has('email'))
        {
            $products = Add_Product::all();
            $itemArr = array();
            $qtyArr = array();
            $checkUser = Add_Cart::where('user_id',Session::get('user_id'))->first();
            if($checkUser)
            {
                $cartitem = Add_Cart::where('user_id',Session::get('user_id'))->first();
                $oldItem = $cartitem->cartItem;
                $tempVal = '';
                for($data=0;$data<strlen($oldItem);$data++)
                {
                    if($oldItem[$data] == ",")
                    {
                        array_push($itemArr,(int)$tempVal);
                        $tempVal = '';
                    }
                    else
                    {
                        $tempVal = $tempVal.$oldItem[$data];
                    }
                }
                $oldqty = $cartitem->cartsitemqty;
                $tempVal = '';
                for($data=0;$data<strlen($oldqty);$data++)
                {
                    if($oldqty[$data] == ",")
                    {
                        array_push($qtyArr,(int)$tempVal);
                        $tempVal = '';
                    }
                    else
                    {
                        $tempVal = $tempVal.$oldqty[$data];
                    }
                }
                $totalPrice = 0;
                $temPrice = 0;
                for ($i=0; $i < count($itemArr); $i++) { 
                    $tem = $itemArr[$i];
                    $checkUser = Add_Product::where('p_id',$tem)->first();
                    $temPrice = $checkUser->p_listprice - ($checkUser->p_listprice * $checkUser->p_op)/100;
                    $totalPrice = $totalPrice + ($temPrice * $qtyArr[$i]);
                }
                return view('checkout',compact('itemArr','qtyArr','products','totalPrice'));
            }
            return view('checkout',compact('products'));
        }
        return redirect('login');
    }
    // order conform
    public function order(Request $request)
    {
        if(Session::has('email'))
        {
            $countOrders = Order_Masters::count();
            $year = date('Y');
            $month = date('m');
            $day = date('d');
            $dmy = $year.$month.$day.($countOrders+1);
            $neworder = new Order_Masters();
            $neworder->orderid = (int)$dmy;
            $neworder->firstname = $request->firstName;
            $neworder->lastname = $request->lastName;
            $neworder->mobile_no = $request->mobileno;
            $neworder->email = $request->email;
            $neworder->house_no = $request->houseno;
            $neworder->street = $request->street;
            $neworder->city = $request->city;
            $neworder->district = $request->district;
            $neworder->pincode = $request->pincode;
            $neworder->state = $request->state;
            $neworder->user_id = Session::get('user_id');
            $neworder->ordertotalprice = $request->totalprice;
            $neworder->orderstatus = 0;
            $neworder->order_date = date('Y-m-d');
            $neworder->save();

            $itemArr = array();
            $qtyArr = array();
            $checkUser = Add_Cart::where('user_id',Session::get('user_id'))->first();
            if($checkUser)
            {
                $cartitem = Add_Cart::where('user_id',Session::get('user_id'))->first();
                $oldItem = $cartitem->cartItem;
                $tempVal = '';
                for($data=0;$data<strlen($oldItem);$data++)
                {
                    if($oldItem[$data] == ",")
                    {
                        array_push($itemArr,(int)$tempVal);
                        $tempVal = '';
                    }
                    else
                    {
                        $tempVal = $tempVal.$oldItem[$data];
                    }
                }
                $oldqty = $cartitem->cartsitemqty;
                $tempVal = '';
                for($data=0;$data<strlen($oldqty);$data++)
                {
                    if($oldqty[$data] == ",")
                    {
                        array_push($qtyArr,(int)$tempVal);
                        $tempVal = '';
                    }
                    else
                    {
                        $tempVal = $tempVal.$oldqty[$data];
                    }
                }
            }
            for ($i=0; $i < count($itemArr); $i++) { 
                $newOrderDetails = new Orders_Detail();
                $newOrderDetails->order_id = (int)$dmy;
                $newOrderDetails->itemid = $itemArr[$i];
                $newOrderDetails->itemqtys = $qtyArr[$i];
                $products = Add_Product::where('p_id',$itemArr[$i])->first();
                $oprice = $products->p_listprice - ($products->p_listprice * $products->p_op) /100.00;
                $newOrderDetails->itemprice = $oprice;
                $newOrderDetails->save();
            }
            $clearCart = Add_Cart::where('user_id',Session::get('user_id'))->first();
            $clearCart->delete();
            $order_id = $dmy;
            return view('orderconform',compact('order_id'));
        }
        return redirect('login');
    }
    // orderhistory
    public function orderhistory()
    {
        if(Session::has('email'))
        {
            $orders = Order_Masters::where('user_id',Session::get('user_id'))->get();
            return view('orderhistory',compact('orders'));  
        }
        return redirect('login');
    }
    //Admin Side Manage Order
    public function manageorderview()
    {
        if(Session::has('adminemail'))
        {
            $orders=Order_Masters::paginate(10);
           // $orders = Order_Masters::all();
            return view('admin.manage_order',compact('orders'));
        }
        return redirect('admin/index');
    }
    
    //Admin Side Edit Data Show
    public function changeorderinfo($orderid)
    {
        if(Session::has('adminemail'))
        {
            $order_master = Order_Masters::where('orderid',$orderid)->first();
            $order_detail = Orders_Detail::where('order_id',$order_master->orderid)->get();
            $products = Add_Product::all();
            return view('admin.change_order_info',compact('order_master','order_detail','products'));
        }
        return redirect('admin');
    }
    //Admin Side Update Order
    public function updateorderinfo(Request $request)
    {
        if(Session::has('adminemail'))
        {
            // $updateorder = Order_Masters::where('orderid',$request->orderid)->first();
            // $updateorder->orderstatus = $request->orderStatus;
            // $updateorder->save();
            $orderid = $request->input('orderid');
            $orderStatus = $request->input('orderStatus');
            DB::update('update ordermasters set orderStatus = ? where orderid = ?',[$orderStatus,$orderid]);
            return redirect('admin/manage_order')->with('message','Order Updated Successfully');
        }
        return redirect('admin/index');
    }
    // public function delete_order($orderid)
    // {
        
    //     if(Session::has('adminemail'))
    //     {
    //         $delete_order = Order_Masters::where('orderid',$orderid)->first();
    //         dd( $delete_order->$orderid);
    //         $delete_order->delete();
    //         return redirect('admin/manage_order')->with('message', 'OrderDeleted Successfully!');
    //     }
    //     return redirect('admin/index');
    // }
}

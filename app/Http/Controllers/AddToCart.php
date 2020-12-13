<?php

namespace App\Http\Controllers;

use Session;
use App\Add_Cart;
use App\Add_Category;
use App\Add_Product;
use URL;
use Illuminate\Http\Request;

class AddToCart extends Controller
{
    public function addtocart(Request $request)
    {
        if(Session::has('email'))
        {
            $getUrl = $request->currentUrl;
            if($request->submit)
            {
                $checkUser = Add_Cart::where('user_id',Session::get('user_id'))->first();
                if($checkUser)
                {
                    $cartitem = Add_Cart::where('user_id',Session::get('user_id'))->first();
                    $oldItem = $cartitem->cartItem;
                    $itemArr = array();
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
                    if(in_array($request->pid,$itemArr))
                    {
                       // return redirect($getUrl);
                       return redirect('/');
                    }
                    else
                    {
                        $cartitem->cartItem = $cartitem->cartItem.$request->pid.',';
                        $cartitem->cartsitemqty = $cartitem->cartsitemqty.'1,';
                        $cartitem->save();
                        //return redirect($getUrl);
                        return redirect('/');
                    }
                }
                else
                {
                    $cartitem = new Add_Cart();
                    $cartitem->user_id = Session::get('user_id');
                    $cartitem->cartItem = $request->pid.',';
                    $cartitem->cartsitemqty = '1,';
                    $cartitem->save();
                    return redirect('/');
                }
            }
        }
        return redirect('login');
    }
    // User Side View Your Cart Item
    public function viewcart(Request $request)
    {
        if(Session::has('email'))
        {
            $categories = Add_Category::All();
            $products = Add_Product::All();
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
                return view('viewcart',compact('categories','itemArr','qtyArr','products'));
            }
            return view('viewcart',compact('categories','itemArr'));
        }
        return redirect('login');
    }
    //User Side PlusCartItem Item From Cart
    public function pluscartitem(Request $request)
    {
        if(Session::has('email'))
        {
            $checkUser = Add_Cart::where('user_id',Session::get('user_id'))->first();
            if($checkUser)
            {
                $cartitem = Add_Cart::where('user_id',Session::get('user_id'))->first();
                $oldItem = $cartitem->cartItem;
                $itemArr = array();
                $qtyArr = array();
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
                if(in_array($request->pid,$itemArr))
                {
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
                    $key = array_search($request->pid,$itemArr);
                    $qtyArr[$key] = $qtyArr[$key] + 1;
                    $tempVal = '';
                    for($data=0;$data<count($qtyArr);$data++)
                    {
                        $tempVal = $tempVal.$qtyArr[$data].',';
                    }
                    $cartitem->cartsitemqty = $tempVal;
                    $cartitem->save();
                    return redirect('cart');
                }
            }
        }
        return redirect('login');
    }
    //User Side MinusCartItem Item From Cart
    public function minuscartitem(Request $request)
    {
        if(Session::has('email'))
        {
            $checkUser = Add_Cart::where('user_id',Session::get('user_id'))->first();
            if($checkUser)
            {
                $cartitem = Add_Cart::where('user_id',Session::get('user_id'))->first();
                $oldItem = $cartitem->cartItem;
                $itemArr = array();
                $qtyArr = array();
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
                if(in_array($request->pid,$itemArr))
                {
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
                    $key = array_search($request->pid,$itemArr);
                    $qtyArr[$key] = $qtyArr[$key] - 1;
                    if ($qtyArr[$key] == 0)
                    {
                        return redirect('cart');
                    }
                    $tempVal = '';
                    for($data=0;$data<count($qtyArr);$data++)
                    {
                        $tempVal = $tempVal.$qtyArr[$data].',';
                    }
                    $cartitem->cartsitemqty = $tempVal;
                    $cartitem->save();
                    return redirect('cart');
                }
            }
        }
        return redirect('login');
    }
    //User Side Remove Item From Cart
    public function removecart(Request $request)
    {
        if(Session::has('email'))
        {
            $checkUser = Add_Cart::where('user_id',Session::get('user_id'))->first();
            if($checkUser)
            {
                $cartitem = Add_Cart::where('user_id',Session::get('user_id'))->first();
                $oldItem = $cartitem->cartItem;
                $qtyItem = $cartitem->cartsitemqty;
                $itemArr = array();
                $qtyArr = array();
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
                for($data=0;$data<strlen($qtyItem);$data++)
                {
                    if($qtyItem[$data] == ",")
                    {
                        array_push($qtyArr,(int)$tempVal);
                        $tempVal = '';
                    }
                    else
                    {
                        $tempVal = $tempVal.$qtyItem[$data];
                    }
                }
                if(in_array($request->pid,$itemArr))
                {
                    $key = array_search($request->pid,$itemArr);
                    array_splice($itemArr,$key,1);
                    array_splice($qtyArr,$key,1);
                    $tempVal = '';
                    for($data=0;$data<count($itemArr);$data++)
                    {
                        $tempVal = $tempVal.$itemArr[$data].',';
                    }
                    $tempQty = '';
    
                    for($data=0;$data<count($qtyArr);$data++)
                    {
                        $tempQty = $tempQty.$qtyArr[$data].',';
                    }
                    $cartitem->cartItem = $tempVal;
                    $cartitem->cartsitemqty = $tempQty;
                    $cartitem->save();
                    return redirect('cart');
                }
            }
        }
        return redirect('login');
   }
}

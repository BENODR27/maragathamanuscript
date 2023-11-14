<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Auth;
class OrderController extends Controller
{
    function browse(Request $req){
        
        if($req->filter=="new"){
            $orders=Order::where('delivered',false)->get()->reverse();
        }
        if($req->filter=="completed"){
            $orders=Order::where('delivered',true)->get()->reverse();
        }
        if($req->filter=="all"){
            $orders=Order::all()->reverse();
        }
        return view('admin.screens.order.browse',['orders'=>$orders]);
    }
    function confirmorder(Request $request){
       
        $placesingleorder=false;
        $validatedData = $request->validate([
            'door_no' => 'required|string|max:255',
            'street_name' => 'required|string|max:255',
            'locality_landmark' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pincode' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->mobile_number = $request->input('mobile_number');
        $user->email = Auth::user()->email;
        $user->address = json_encode([
            'door_no' => $request->door_no,
            'street_name' => $request->street_name,
            'locality_landmark' => $request->input('locality_landmark'),
            'district' => $request->input('district'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'pincode' => $request->input('pincode'),
        ]);
        $user->update();
        if(!session('placesingleorder')){
            $carts=Cart::where('user_id',Auth::user()->id)->get()->map(function($cart){
                $cart->price=Product::find($cart->product_id)->price;
                return $cart;
            });
             
            $totalPrice = $carts->sum(function ($cart) {
                return $cart->price;
            });
        }else{
            $checkCart=Cart::where('user_id',Auth::user()->id)->where('product_id',session('product_id'))->get();
     
            if(count($checkCart)==0)
            {
            $cart=new Cart();
            $cart->product_id=session('product_id');
            $cart->user_id=Auth::user()->id;
            $cart->save();
            }else{
                $cart=Cart::where('product_id',session('product_id'))->first();
            }
            $totalPrice=Product::find(session('product_id'))->price;
        }
        

        
        $order=new Order();
        $order->total_amount=$totalPrice;
        $order->user_id=Auth::user()->id;
        if(!session('placesingleorder')){
        $order->products_data=json_encode($carts->pluck('price','product_id'));
        }else{
            $cart->price=Product::find(session('product_id'))->price;

            $order->products_data = json_encode([
                $cart['product_id'] => $cart['price']
            ]);       
         }
        $order->save();

       if(!session('placesingleorder')){
        Cart::truncate();
       }else{
        $cart->delete();
       }
        return redirect()->route('order.list')->with('success', 'Order placed successfully');
    }
    function view(Request $req){
        $products=[];
        $order=Order::find($req->order_id);
   

        foreach(json_decode($order->products_data) as $product_id=>$data){
            $product=Product::find($product_id);
            $product->orderedprice=$data;
            $products[]=$product;
        }
        $user=User::find($order->user_id);
        $user->address=json_decode($user->address);

        return view('admin.screens.order.view',['order'=>$order,'products'=>$products,'user'=>$user]);
    }
    function completeorder(Request $req){
        $order=Order::find($req->order_id);
        if(!$order->delivered){
            $order->delivered=true;
            $order->payment_status="paid";
        }
        // else{
        //     $order->delivered=false;
        //     $order->payment_status="unpaid";
        // }
        $order->save();
        return redirect()->back();
    }
    function orderlist(){
        $orders=Order::where('user_id',Auth::user()->id)->get()->reverse();
        foreach($orders as $order){
            $temp=[];
            foreach(json_decode($order->products_data) as $product_id=>$price){
                $product=Product::find($product_id);
                $product->orderedPrice=$price;
                $temp[]=$product;
            }
            $order->products=$temp;
        }
        return view('website.screens.orders',['orders'=>$orders,'pageTitle'=>"MY ORDERS"]);
    }
    // function confirmsingleorder(Request $request){

    //     $validatedData = $request->validate([
    //         'door_no' => 'required|string|max:255',
    //         'street_name' => 'required|string|max:255',
    //         'locality_landmark' => 'required|string|max:255',
    //         'district' => 'required|string|max:255',
    //         'state' => 'required|string|max:255',
    //         'country' => 'required|string|max:255',
    //         'pincode' => 'required|string|max:255',
    //         'name' => 'required|string|max:255',
    //         'mobile_number' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //     ]);
        
    //     $user = User::find(Auth::user()->id);
    //     $user->name = $request->input('name');
    //     $user->mobile_number = $request->input('mobile_number');
    //     $user->email = Auth::user()->email;
    //     $user->address = json_encode([
    //         'door_no' => $request->door_no,
    //         'street_name' => $request->street_name,
    //         'locality_landmark' => $request->input('locality_landmark'),
    //         'district' => $request->input('district'),
    //         'state' => $request->input('state'),
    //         'country' => $request->input('country'),
    //         'pincode' => $request->input('pincode'),
    //     ]);
    //     $user->update();
        
    //     $checkCart=Cart::where('user_id',Auth::user()->id)->where('product_id',session('product_id'))->get();
     
    //     if(count($checkCart)==0)
    //     {
    //     $cart=new Cart();
    //     $cart->product_id=session('product_id');
    //     $cart->user_id=Auth::user()->id;
    //     $cart->save();
    //     }else{
    //         $cart=Cart::where('product_id',session('product_id'))->first();
    //     }

    //     // $carts=Cart::where('user_id',Auth::user()->id)->get()->map(function($cart){
    //     //     $cart->price=Product::find($cart->product_id)->price;
    //     //     return $cart;
    //     // });
         
    //     // $totalPrice = $carts->sum(function ($cart) {
    //     //     return $cart->price;
    //     // });
    //     $totalPrice=Product::find($cart->product_id)->price;
        
    //     $order=new Order();
    //     $order->total_amount=$totalPrice;
    //     $order->user_id=Auth::user()->id;
    //     $order->products_data=json_encode($cart->pluck('price','product_id'));
    //     $order->save();
    //     $cart->delete();
    //     // Cart::truncate();
        
    //     return redirect()->route('order.list')->with('success', 'Order placed successfully');
    // }
}

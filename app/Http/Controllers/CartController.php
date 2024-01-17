<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Auth;
class CartController extends Controller
{
    function cartList(){
        $carts=Cart::where('user_id',Auth::user()->id)->get()->reverse()->map(function($cart){
            $product=$cart->product;
            if($product->quantity<$cart->quantity){
                $cart->quantity=$product->quantity;
                $cart->save();
            }
            if(($product->quantity>0) &&($cart->quantity==0)){
                $cart->quantity=1;
                $cart->save();
            }
            return $cart;
        });
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->product->price;
        });
        return view('website.screens.cart',['pageTitle'=>"CART",'carts'=>$carts,'totalPrice'=>$totalPrice]);
    }

        //add product to cart from website

   function addToCart(Request $req){
      $checkCart=Cart::where('user_id',Auth::user()->id)->where('product_id',$req->product_id)->get();
     
      if(count($checkCart)==0)
      {
      $cart=new Cart();
      $cart->product_id=$req->product_id;
      $cart->user_id=Auth::user()->id;
      $cart->quantity=1;
      $cart->save();
      }

      return redirect()->route('product.cart.list')->with(["msg"=>"Book Added to Cart",'status'=>'Success']);
   }


    function delete(Request $req){
    Cart::find($req->cart_id)->delete();
    return redirect()->back()->with(['msg'=>'Book Deleted From Cart Successfully','status'=>'Success']);
    }

    function proceedCheckout(Request $req){
        if($req->placesingleorder==true){
            session(["placesingleorder"=>true]);
        }else{
            session(["placesingleorder"=>false]);
        }
        $user=Auth::user();
     
        if($user->address!=null){
            $address=json_decode($user->address);
        }else{
            $address = json_decode(json_encode([
                'door_no' => "",
                'street_name' => "",
                'locality_landmark' => "",
                'district' => "",
                'state' => "",
                'country' => "",
                'pincode' => "",
            ]));
        }
        
        return view('website.screens.placeorder',['pageTitle'=>"PROCEED CHECKOUT",'address'=>$address]);
    }
    public function updateQuantity($cart_id,$quantity)
    {
        
        $product=Product::find(Cart::find($cart_id)->product_id);
        if($product->quantity < $quantity){
            $quantity=$product->quantity;
        }
        return response()->json(['qty'=>$quantity]);
    }
    

}

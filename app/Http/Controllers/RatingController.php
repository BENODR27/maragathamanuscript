<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;
use App\Models\User;
use Auth;
class RatingController extends Controller
{
    function add(Request $req){
       $rating=new Rating();
       $rating->comment=$req->comment;
       $rating->star_count=$req->rate==null?0:$req->rate;
       $rating->product_id=$req->product_id;
       $rating->user_id=Auth::user()->id;
       $rating->save();

       $product=Product::find($req->product_id);
        $product->viewers=$product->viewers+1;
        $rating_average=Rating::where('product_id',$req->product_id)->get()->sum(function ($rating) {
            return $rating->star_count;
        });
        $product->rating_average=round($rating_average/$product->viewers);
        $product->save();
    //    return redirect()->back();
    return response()->json(["msg"=>"success"]);
    }
    function deleteRatingSelf(Request $req){
        Rating::find($req->rating_id)->delete();
        return redirect()->back();
    }
    function productRatingView(Request $req){
        $ratings=Rating::where("product_id",$req->product_id)->get();
        return view('admin.screens.rating.browse',["ratings"=>$ratings]);
    }
    function reviewsList($product_id){
        $reviews=Rating::where('product_id',$product_id)->get()->map(function($rating){
            $rating->user=User::find($rating->user_id);
            return $rating;
        });      
        return response()->json($reviews);
    }
}

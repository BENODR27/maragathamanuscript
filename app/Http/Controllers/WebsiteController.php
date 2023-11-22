<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segment;
use App\Models\Product;
use App\Models\Genre;
use App\Models\Error;
use App\Models\User;
use App\Models\Category;
use App\Models\Work;
use App\Models\Rating;
use App\Models\Appointment;

use Illuminate\Support\Facades\Hash;
use Auth;
class WebsiteController extends Controller
{
    function userRegisterSave(Request $req){
       $user=new User();
       $user->name=$req->name;
       $user->email=$req->email;
       $user->role="user";
       $user->password=Hash::make($req->password);
       $user->save();
       return redirect()->route('website.auth.login');
        
    }
    function userLoginCheck(Request $req){

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            $lastRoute=session('last_route_name');
           if($lastRoute!=null){
            return redirect()->route($lastRoute);
           }else{
            return redirect()->route('category.segments',['category_id'=>session('category_id')]);
           }
            
        } else {
            return redirect()->route('website.auth.login');
        }
    }
    function LandingCategoryList(){
        $categories=Category::all();
        return view('website.screens.landing',['categories'=>$categories]);
    }
    function errorThrow(){
        $error = new Error();
        $error->message = $e->getMessage();
        $error->stack_trace = $e->getTraceAsString();
        $error->save();
        return redirect()->back()->with(['msg'=>"something went wrong"]);
    }

    function categorySegmentsList(Request $req){
        try {
            session(['category_id' => $req->category_id]);

            $category=Category::find($req->category_id);
            if($category->category_type=="audio_video"){

                return redirect()->route('genres.list');
                // return redirect()->route('production.home');
            }
       

        $list = Segment::where('category_id',$req->category_id)->get()->map(function ($segment) {
            $segment->products = Product::where('segment_id', $segment->id)->where('is_active',true)->get()->take(6)->map(function ($product){
                $product->genreName=Genre::find($product->genre_id)->name;
                return $product;
            });
            return $segment;           
        });
        return view('website.screens.publications_comics_others.segments',['segments'=>$list,'pageTitle'=>Category::find($req->category_id)->name,'category_id'=>$req->category_id,'products'=>Product::where('category_id', $req->category_id)->where('is_active',true)->get()]);
    }catch (\Exception $e) {
       $this->errorThrow();
    }
    }
    
    function publicationProductsList(Request $req){ 
       
        try {
            $segmentProducts=Product::where('segment_id',$req->segment_id)->where('is_active',true)->get()->map(function($segmentProduct){
                $segmentProduct->genreName=Genre::find($segmentProduct->genre_id)->name;
                return $segmentProduct;
            });
            return view('website.screens.publications_comics_others.products',['products'=>$segmentProducts,'pageTitle'=>Segment::find($req->segment_id)->name]);
        }catch (\Exception $e) {
            $this->errorThrow();
        }
    }
    function publicationProduct(Request $req) {
        session(["product_id"=>$req->product_id]);
        $publicationProduct=Product::find($req->product_id);
        $publicationProduct->user=User::find($publicationProduct->user_id);
        $publicationProduct->ratings=Rating::where('product_id',$req->product_id)->get()->map(function($rating){
            $rating->user=User::find($rating->user_id);
            return $rating;
        });

        return view('website.screens.publications_comics_others.product',['product'=>$publicationProduct,'pageTitle'=>$publicationProduct->title]);
    }
    function about(){
        $user=Auth::user();
        $user->submissionCount=Work::where('user_id',$user->id)->count();
        $user->appointmentsCount=Appointment::where('user_id',$user->id)->count();
        return view('website.screens.about',['user'=>$user,'pageTitle'=>"ABOUT"]);
    }
    function notifications(){

        $user=Auth::user();
        
        return view('website.screens.notifications',['pageTitle'=>"NOTIFICATIONS"]);
    }
    function publicToggle(Request $req){
      $user=User::find($req->user_id);
      $user->public=$user->public?false:true;
      $user->save();
      return redirect()->back();
    }
}

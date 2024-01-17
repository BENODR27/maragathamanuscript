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
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Hash;
use Auth;
use Share;
use Illuminate\Support\Facades\Validator;


class WebsiteController extends Controller
{
    function userRegisterSave(Request $req){
         // Validation rules
    $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|string|min:6',
    ];
          // Custom error messages
    $messages = [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Invalid email format.',
        'email.unique' => 'Email is already taken.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 6 characters.',
    ];

    // Validate the request data
    $validator = Validator::make($req->all(), $rules, $messages);

    // Check for validation failure
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
       $user=new User();
       $user->name=$req->name;
       $user->email=$req->email;
       $user->role="user";
       $user->password=Hash::make($req->password);
       $user->save();
       return redirect()->route('website.auth.login');
        
    }
    function userLoginCheck(Request $req){
         // Validation rules
    $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    // Custom error messages
    $messages = [
        'email.required' => 'The email field is required.',
        'email.email' => 'Invalid email format.',
        'password.required' => 'The password field is required.',
    ];

    // Validate the request data
    $validator = Validator::make($req->all(), $rules, $messages);

    // Check for validation failure
    if ($validator->fails()) {
        return redirect()->route('website.auth.login')->withErrors($validator)->withInput();
    }

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            $lastRoute=session('last_route_name');
           if($lastRoute!=null){
            return redirect()->route($lastRoute);
           }else{
            return redirect()->route('category.segments',['category_id'=>session('category_id')]);
           }
            
        } else {
            return redirect()->route('website.auth.login')->with(['msg'=>'Please Enter Valid Credentials']);
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
            }
        $list = Segment::where('category_id',$req->category_id)->get()->map(function ($segment) {
                $segment->products->where('is_active',true)->take(6);
            return $segment;           
        });
        return view('website.screens.publications_comics_others.segments',['segments'=>$list,'pageTitle'=>Category::find($req->category_id)->name,'category_id'=>$req->category_id,'products'=>Product::where('category_id', $req->category_id)->where('is_active',true)->get()]);
    }catch (\Exception $e) {
       $this->errorThrow();
    }
    }
    
    function publicationProductsList(Request $req){ 
       
        try {
            $segmentProducts=Product::where('segment_id',$req->segment_id)->where('is_active',true)->get();
            return view('website.screens.publications_comics_others.products',['products'=>$segmentProducts,'pageTitle'=>Segment::find($req->segment_id)->name]);
        }catch (\Exception $e) {
            $this->errorThrow();
        }
    }
    function publicationProduct(Request $req) {
        session(["product_id"=>$req->product_id]);
        $publicationProduct=Product::find($req->product_id);
        return view('website.screens.publications_comics_others.product',['product'=>$publicationProduct,'pageTitle'=>$publicationProduct->title]);
    }
    function about(){
        $user=Auth::user();
        return view('website.screens.about',['user'=>$user,'pageTitle'=>"ABOUT"]);
    }
    function share(Request $req){
        
        $user=User::find($req->shared_id);
        if($user->public){
            return view('website.screens.profile.share',['user'=>$user]);
        }else{
            return redirect('/')->with(["msg"=>"Not permitted please contact Author"]);
        }
    }
    function notifications(){

        $user=Auth::user();
        
        return view('website.screens.notifications',['pageTitle'=>"NOTIFICATIONS"]);
    }
    function publicToggle(Request $req){
      $user=User::find($req->user_id);
      $user->public=$user->public?false:true;
      $user->save();
      return redirect()->back()->with(["msg"=>"Your Profile Mode Changed"]);;
    }
    function userProducts(Request $req){ 
        try {
            $segmentProducts=Product::where('user_id',$req->user_id)->where('is_active',true)->get();
            return view('website.screens.publications_comics_others.products',['products'=>$segmentProducts,'pageTitle'=>User::find($req->user_id)->name]);
        }catch (\Exception $e) {
            $this->errorThrow();
        }
    }
    function editUser(Request $request){
        $user=User::find($request->user_id);
        if($user->address==null){
            $user->address = json_decode(json_encode([
                'door_no' => "",
                'street_name' => "",
                'locality_landmark' => "",
                'district' => "",
                'state' => "",
                'country' => "",
                'pincode' => "",
            ]));
        }else{
            $user->address=json_decode($user->address);
        }
       
        return view('website.screens.profile.edit',['user'=>$user,'address'=>$user->address]);
    }
    function updateUser(Request $req){
        $user=User::find($req->user_id);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->mobile_number=$req->mobile_number;
        $user->language=$req->language;
        if($req->poster_image!=null){
            
            ImageHelper::deleteImage($user->profile_image_name,"profile/",true);
            $user->profile_image_name= ImageHelper::storeImage($req->poster_image,"profile/"); 
        }
        $user->address = json_encode([
            'door_no' => $req->door_no,
            'street_name' => $req->street_name,
            'locality_landmark' => $req->input('locality_landmark'),
            'district' => $req->input('district'),
            'state' => $req->input('state'),
            'country' => $req->input('country'),
            'pincode' => $req->input('pincode'),
        ]);
        $user->update();
        return redirect()->route('website.user.about');
    }
}

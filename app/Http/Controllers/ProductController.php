<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Segment;
use App\Models\Department;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function browse(){
        $products=Product::all()->reverse();
        return view('admin.screens.product.browse',['products'=>$products]);
    }
    function add(Request $req){
        $departments=Department::all();
        $category=Category::find($req->category_id);
        $genres=Genre::where('category_id',$req->category_id)->get();
        $segments=Segment::where('category_id',$req->category_id)->get();
        return view('admin.screens.product.add',['category'=>$category,'genres'=>$genres,'segments'=>$segments,'departments'=>$departments]);
    }
    function save(Request $request)
    {

        // Handle file upload
        if ($request->hasFile('poster_image')) {
            $uploadedFile = $request->file('poster_image');
    
            // Generate a unique filename for the image
            $fileName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
        
            // Move the uploaded file to the desired directory within the public disk
            $uploadedFile->storeAs('public/posterimages', $fileName);
        
            // Save the image path in the database
            $imagePath = 'storage/posterimages/' . $fileName;  // You can specify a storage path here
       
                // Open the uploaded image using Intervention Image
            $image = Image::make(public_path($imagePath));
                    
                // Resize the image to a square shape (e.g., 400 pixels)
            $image->fit(400);
            
            // Save the resized image
             $image->save(public_path($imagePath));
        }

        // Create a new Product instance and save it to the database
        $product = new Product();
        $product->category_id = $request->category;
        $product->segment_id = $request->segment;
        $product->poster_image_name = $imagePath; // Store the image path in your database
        $product->genre_id = $request->genre;
        $product->user_id=Auth::user()->id;
        $product->title = $request->title;
        $product->quantity = $request->quantity;
        $product->one_line_concept = $request->one_line_concept;
        // $product->preview = $request->preview;
        if( $request->price!=null){
            $product->price = $request->price;
        }
        if( $request->quantity!=null){
            $product->quantity = $request->quantity;
        }
        
        $product->product_type = $request->product_type;
        if($product->product_type=="video"){
            $product->audio_video_url = $request->audio_video_url;
            $product->director = $request->director;
            $product->music = $request->music;
        }
        if($product->product_type=="audiobook"){
            $product->audio_video_url = $request->audio_video_url;
            $product->author = $request->author;
        }
        if($request->department!=null){
            $product->department_id=$request->department;
        }
        if($request->language!=null){
            $product->language=$request->language;      
        }
        $product->save();

        // Redirect back with a success message
        return redirect()->route('category.products.view',['category_id'=>$request->category])->with('success', 'Product added successfully');
    }
    function edit(Request $req){
        $product=Product::find($req->product_id);
        return view('admin.screens.product.edit',['product'=>$product]);
    }
    function update(Request $req){
        $product=Product::find($req->product_id);
        $product->name=$req->name;
        $product->update();
        return redirect()->route('product.browse');
    }
    function delete(Request $req){
        $product=Product::find($req->product_id);
        $product->delete();
        return redirect()->back();
    }
    function view(Request $req){
        $product=Product::find($req->product_id);
        $product->category=Category::find($product->category_id)->name;
        $product->segment=(Segment::find($product->segment_id)->name)??"";
        $product->genre=(Genre::find($product->genre_id)->name)??"";
        $product->department=(Department::find($product->department_id)->name)??"";
        return view('admin.screens.product.view',["product"=>$product]);
    }
    function toggleStatus(Request $req){
        $product=Product::find($req->product_id);
        $product->is_active=($product->is_active)?false:true;
        $product->save();
        return redirect()->back();
    }
}

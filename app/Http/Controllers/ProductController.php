<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Segment;
use App\Models\Department;
use App\Models\User;
use App\Models\Rating;
use Auth;
use Storage;
use App\Helpers\ImageHelper;
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
        $imageName = ImageHelper::storeImage($request->poster_image); 

        // Create a new Product instance and save it to the database
        $product = new Product();
        $product->category_id = $request->category;
        $product->segment_id = $request->segment;
        $product->poster_image_name = $imageName; // Store the image path in your database
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
        if ($request->hasFile('e_book_file')) {
            $pdfName=ImageHelper::storePdf($request->file('e_book_file'));
            $product->e_book_file_name=$pdfName;
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
        $departments=Department::all();
        $category=Category::find($product->category_id);
        $genres=Genre::where('category_id',$product->category_id)->get();
        $segments=Segment::where('category_id',$product->category_id)->get();
        return view('admin.screens.product.edit',['product'=>$product,'category'=>$category,'genres'=>$genres,'segments'=>$segments,'departments'=>$departments]);
    }
    function update(Request $request){

        // Create a new Product instance and save it to the database
        $product=Product::find($request->product_id);
        if($request->segment!=null){
            $product->segment_id = $request->segment;
        }
        if($request->poster_image!=null){

            ImageHelper::deleteImage($product->poster_image_name,"posterimages/",true);

            $imageName = ImageHelper::storeImage($req->poster_image); 
            $product->poster_image_name = $imageName; // Store the image path in your database
        }
        if($request->genre!=null){
            $product->genre_id = $request->genre;     
        }
        if($request->title!=null){
            $product->title = $request->title;     
        }
        if($request->quantity!=null){
            $product->quantity = $request->quantity;     
        }
        if($request->one_line_concept!=null){
            $product->one_line_concept = $request->one_line_concept;     
        }
        if( $request->price!=null){
            $product->price = $request->price;
        }
        if( $request->quantity!=null){
            $product->quantity = $request->quantity;
        }
        if ($request->hasFile('e_book_file')) {
            ImageHelper::deletePDF($product->e_book_file_name,"work/");
            $pdfName=ImageHelper::storePdf($request->file('e_book_file'));
            $product->e_book_file_name=$pdfName;
        }
        
        $product->product_type = $request->product_type;
        if($product->product_type=="video"){
            if( $request->audio_video_url!=null){
            $product->audio_video_url = $request->audio_video_url;
            }
            if( $request->director!=null){
            $product->director = $request->director;
            }
            if( $request->music!=null){
            $product->music = $request->music;
            }
        }
        if($product->product_type=="audiobook"){
            if( $request->audio_video_url!=null){
            $product->audio_video_url = $request->audio_video_url;
            }
            if( $request->author!=null){
                $product->author = $request->author;
            }
        }
        if($request->department!=null){
            $product->department_id=$request->department;
        }
        if($request->language!=null){
            $product->language=$request->language;      
        }
        $product->update();

        // Redirect back with a success message
        return redirect()->route('category.products.view',['category_id'=>$request->category])->with('success', 'Product added successfully');
    }
    function delete(Request $req){
        $product=Product::find($req->product_id);
        ImageHelper::deleteImage($product->poster_image_name,"posterimages/main/",true);
        
        if ($product->e_book_file_name!=null) {
            ImageHelper::deletePDF($product->e_book_file_name,"work/");
        }
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
    function productSearch(Request $req){
      $publicationProduct=Product::where('title',$req->product_title)->first();
      if($publicationProduct!=null){
        $publicationProduct->user=User::find($publicationProduct->user_id);
        $publicationProduct->ratings=Rating::where('product_id',$req->product_id)->get()->map(function($rating){
            $rating->user=User::find($rating->user_id);
            return $rating;
        });

        return view('website.screens.publications_comics_others.product',['product'=>$publicationProduct,'pageTitle'=>$publicationProduct->title]);      }else{
      } 
    return redirect()->back()->with(['msg'=>'Searched Book Not Found Sorry For Inconveniences','status'=>'Success']);


    }
}

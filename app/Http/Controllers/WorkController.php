<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Segment;
use App\Models\Department;
use App\Models\Work;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\Notification;
use Intervention\Image\ImageManagerStatic as Image;

use App\Notifications\UserNotification;

class WorkController extends Controller
{
    function view(Request $req){
        session(["work_id"=>$req->work_id]);
        $work=Work::find($req->work_id);
        $departments=Department::all();
        $category=Category::where("name","OTHERS")->first();
        $genres=Genre::where('category_id',$category->id)->get();
        $segments=Segment::where('category_id',$category->id)->get();
        return view('admin.screens.submission.view',['category'=>$category,'genres'=>$genres,'segments'=>$segments,'departments'=>$departments,'work'=>$work]);
    }
    function list(){
        $user=Auth::user();
        $works=Work::where('user_id',$user->id)->get()->reverse()->map(function($work){
            $work->genreName=Genre::find($work->genre_id)->name;
            return $work;
        });
        return view('website.screens.submission.list',['works'=>$works,'pageTitle'=>"MY SUBMISSIONS"]);
    }
    function add(){
        $category=Category::where("name","OTHERS")->first();
        
        $genres=Genre::where('category_id',$category->id)->get();
        return view('website.screens.submission.add',['genres'=>$genres,'pageTitle'=>"NEW SUBMISSION"]);
    }

    function save(Request $req){
        $customAttributes = [
            'product_type' => 'Book Type', 
            'file'=>'Work ',
            'author_name'=>'Author Name ',
            'title'=>'Title',
            'language'=>'Language',
            'genrename'=>'Genre Name',
            'poster_image'=>'Poster Image',
            'terms'=>'Terms & Conditions',
        ];
        $customMessages = [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field cannot be more than :max characters.',
            'in' => 'Invalid value selected for the :attribute field.',
            'mimes' => 'The :attribute must be a file of type: :values.',
            'accepted' => 'You must accept the :attribute.',
        ];
        $req->validate([
            'author_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'product_type' => 'required|in:book,ebook',
            'poster_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the allowed image types and size as needed.
            'genrename' => 'required|string', // Assuming it's a string.
            'language' => 'required|in:tamil,english', // Add other languages as needed.
            'file' => 'required|mimes:pdf,epub', // Adjust the allowed file types as needed.
            'terms' => 'required|accepted', // A checkbox that needs to be checked.
        ],$customMessages,$customAttributes);
        // $genre_id;
        // if($req->genrename!=null){
        //     $genre=Genre::where('name',$req->genrename)->where('category_id',9)->first();
        //     if($genre==null){
        //         $genre=new Genre();
        //         $genre->name=$req->genrename;
        //         $genre->category_id=9;
        //         $genre->isCustomGenre=true;
        //         $genre->save();
        //         $genre_id=$genre->id;
        //     }else{
        //         $genre_id=$genre->id;
        //     }
        // }

        // Handle file upload
        if ($req->hasFile('poster_image')) {
            $uploadedFile = $req->file('poster_image');
    
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

        $work=new Work();
        $work->author_name=$req->author_name;
        $work->title=$req->title;
        $work->genre_id=$req->genre;
        $work->user_id=Auth::user()->id;//LOGINNED USER
        $work->language=$req->language;
        $work->poster_image_name = $imagePath; // Store the image path in your database
        $work->product_type = $req->product_type;
       // Handle file upload
       if ($req->hasFile('file')) {
        $uploadedFile = $req->file('file');

        // Generate a unique filename for the image
        $fileName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
    
        // Move the uploaded file to the desired directory within the public disk
        $uploadedFile->storeAs('public/work', $fileName);
    
        $imagePath =$fileName;  // You can specify a storage path here
       }
        $work->file_name=$imagePath;
        $work->terms=true;
        $work->save();

        $user=Auth::user();		
        $message= "work submitted sucessfully" ;
        $messagetone="success";
        $custommessage="";
		Notification::send($user,new UserNotification($message,$messagetone,$custommessage));


        return redirect()->route('submission.list')->with(['msg'=>"successfully added"]);
    }
    function browse(){
        $works=Work::all()->reverse()->map(function($work){
            $work->genreName=Genre::find($work->genre_id)->name;
            return $work;
        });
        return view('admin.screens.submission.browse',['works'=>$works]);
    }
    function toggleStatus(Request $req){
        $work=Work::find($req->work_id);
        $work->published=($work->published)?false:true;
        $work->save();
        return redirect()->back();
    }


    //publish work submitted by user
    function publishWork(Request $request)
    {
        $work=Work::find(session('work_id'));
        $work->published=true;

        // Create a new Product instance and save it to the database
        $product = new Product();
        $product->category_id = $request->category;
        $product->segment_id = $request->segment;
        $product->poster_image_name = $work->poster_image_name; // Store the image path in your database
        $product->genre_id = $request->genre;
        $product->user_id=$work->user_id;
        $product->title = $request->title;
        $product->one_line_concept = $request->one_line_concept;
        $product->e_book_file_name = $work->file_name;
        $product->submission_id = $work->id;
        if( $request->price!=null){
            $product->price = $request->price;
        }
        if( $request->quantity!=null){
            $product->quantity = $request->quantity;
        }
        
        $product->product_type = $request->product_type;
      
        if($request->department!=null){
            $product->department_id=$request->department;
        }
        if($request->language!=null){
            $product->language=$request->language;      
        }
        $product->save();
        $work->product_id=$product->id;
        $work->save();
        // Redirect back with a success message
        return redirect()->route('category.products.view',['category_id'=>$request->category])->with('success', 'Product added successfully');
    }
}

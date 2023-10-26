<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    function browse(){
        $categories=Category::all();
        return view('admin.screens.category.browse',['categories'=>$categories]);
    }
    function add(){
        return view('admin.screens.category.add');
    }
    function save(Request $req){
        $category=new Category();
         // Handle file upload
         if ($req->hasFile('category_image')) {
            $uploadedFile = $req->file('category_image');
            
            // Generate a unique filename for the image
            $fileName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
            
            // Move the uploaded file to the desired directory within the public disk
            $uploadedFile->storeAs('public/categoryimages', $fileName);
            
            // Save the image path in the database
            $imagePath = 'storage/categoryimages/' . $fileName;
        
            // Open the uploaded image using Intervention Image
            $image = Image::make(public_path($imagePath));
        
            // Resize the image to a square shape (e.g., 200x200 pixels)
            $image->fit(400);
        
            // Save the resized image
            $image->save(public_path($imagePath));
        
            // Now, you can save the image path and other data to the database
            $category->category_image_name = $imagePath;
            $category->category_type = $req->category_type;
            $category->name = $req->name;
            $category->description = $req->description;
            $category->save();
        }

       
        return redirect()->route('category.browse');
    }
    function edit(Request $req){
        $category=Category::find($req->category_id);
        return view('admin.screens.category.edit',['category'=>$category]);
    }
    function update(Request $req){
        $category=Category::find($req->category_id);
        $category->name=$req->name;
        $category->update();
        return redirect()->route('category.browse');
    }
    function delete(Request $req){
        $category=Category::find($req->category_id);
        $category->delete();
        return redirect()->back();
    }
    function viewProducts(Request $req){
        $products=Product::where('category_id',$req->category_id)->get()->reverse();
         // $products=Product::all();
         return view('admin.screens.product.browse',['products'=>$products,'category_id'=>$req->category_id]);
     }
    
}

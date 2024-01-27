<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Product;
use App\Models\Category;
class GenreController extends Controller
{
    function browse(Request $req){
        $genres=Genre::where('category_id',$req->category_id)->get();
        return view('admin.screens.genre.browse',['genres'=>$genres,'category_id'=>$req->category_id]);
    }
    function add(Request $req){
        $category=Category::find($req->category_id);
        return view('admin.screens.genre.add',['category'=>$category]);
    }
    function save(Request $req){
        $genre=new Genre();
        $genre->name=$req->name;
        $genre->category_id=$req->category;
        $genre->save();
        if($req->task=="addnew"){
            return redirect()->back();
        }else{
            return redirect()->route('genre.browse',['category_id'=>$req->category]);
        }
    }
    function edit(Request $req){
        $genre=Genre::find($req->genre_id);
        return view('admin.screens.genre.edit',['genre'=>$genre]);
    }
    function update(Request $req){
        $genre=Genre::find($req->genre_id);
        $genre->name=$req->name;
        $genre->update();
        return redirect()->route('genre.browse',['category_id'=>$genre->category_id]);
    }
    function delete(Request $req){
        $genre=Genre::find($req->genre_id);
        $genre->delete();
        return redirect()->back();
    }
    function viewProductsByGenre(Request $req){
        $products=Product::where('genre_id',$req->genre_id)->get()->reverse();
         // $products=Product::all();
         return view('admin.screens.product.browse',['products'=>$products,'category_id'=>$req->category_id]);
     }
    function genresList(Request $req,$pageTitle="GENRES")  //removed from page
    {
        $genres=Genre::where('category_id',session('category_id'))->get();  //session('category_id',"priya") 
        $category=Category::find(session('category_id'));
        if($category->category_type=="audio_video"){
            $pageTitle=$category->name;
        }
        return view('website.screens.genres',['genres'=>$genres,'pageTitle'=>$pageTitle]);
    }
    
    function genresProductsList($genre_id){
        $products=Product::where('genre_id',$genre_id)->where('is_active',true)->get();
      return response()->json($products);
    }

}

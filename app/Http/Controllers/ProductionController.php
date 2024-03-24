<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Genre;

class ProductionController extends Controller
{
    function home(Request $req){
        $selectedgenre="";
        $genres=Genre::where('category_id',session('category_id'))->get();  //session('category_id') 
        if(count($genres)==0){
            return redirect()->back();
        }
        if($req->has('genre_id')){
            $selectedgenre=$req->genre_id;
            $products=Product::where('genre_id',$req->genre_id)->where('is_active',true)->get();
        }else{
            if(count($genres)>0){
                foreach($genres as $genre){
                    $products=Product::where('genre_id',$genre->id)->where('is_active',true)->get();
                    if(count($products)>0){
                        $selectedgenre=$genre->id;
                        break;
                    }
                }             
            }else{
                $products=[];
            }
        }
        
        return view('website.screens.production.home',['genres'=>$genres,'products'=>$products,'pageTitle'=>"JAS PRODUCTION",'selectedgenre'=>$selectedgenre]);
    }
}

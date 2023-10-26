<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Product;

class SubjectController extends Controller
{
    function home(){
        $departments=Department::all();
        $products=Product::where('department_id',"!=",null)->where('is_active',true)->where('category_id',session('category_id'))->get();
        return view('website.screens.subjects',["pageTitle"=>"SUBJECTS","departments"=>$departments,"products"=>$products]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Product;

class SubjectController extends Controller
{
    function home(){
        $departments=Department::all();
        $products=Product::where('department_id',"!=",null)->where('is_active',true)->where('category_id',session('category_id'));
        return view('website.screens.subjects',["pageTitle"=>"SUBJECTS","departments"=>$departments,"products"=>$products]);
    }
    function subjectsFilter($isTamilSelected,$isEnglishSelected,$selectedDepartmentId){
        $products = Product::where('department_id', '!=', null)
        ->where('is_active', true)
        ->where('category_id', session('category_id'));
    
    if ($isTamilSelected != 0 && $isEnglishSelected == 0) {
        $products->where("language", "tamil");
    } elseif ($isEnglishSelected != 0 && $isTamilSelected == 0) {
        $products->where("language", "english");
    }
    
    if ($selectedDepartmentId != 0) {
        $products->where('department_id', $selectedDepartmentId);
    }
    
    $products = $products->get();
    
    return response()->json($products);
    
    }
}

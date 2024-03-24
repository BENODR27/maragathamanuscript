<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Category;
use App\Models\Genre;
class DraftController extends Controller
{
function draftEdit(Request $req){
    $category=Category::where("name","OTHERS")->first();
    $genres=Genre::where('category_id',$category->id)->get();
    return view('website.screens.submission.draft',['genres'=>$genres,'work'=>Work::find($req->work_id),'pageTitle'=>"Submission Draft"]);
}
}

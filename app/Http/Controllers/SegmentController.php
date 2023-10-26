<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segment;
use App\Models\Category;
class SegmentController extends Controller
{
    function browse(Request $req){
        $segments=Segment::where('category_id',$req->category_id)->get()->reverse();
        return view('admin.screens.segment.browse',['segments'=>$segments,'category_id'=>$req->category_id]);
    }
    function add(Request $req){
        $category=Category::find($req->category_id);
        return view('admin.screens.segment.add',['category'=>$category]);
    }
    function save(Request $req){
        $segment=new Segment();
        $segment->name=$req->name;
        $segment->category_id=$req->category;
        $segment->save();
        return redirect()->route('segment.browse',['category_id'=>$req->category]);
    }
    function edit(Request $req){
        $segment=Segment::find($req->segment_id);
        return view('admin.screens.segment.edit',['segment'=>$segment]);
    }
    function update(Request $req){
        $segment=Segment::find($req->segment_id);
        $segment->name=$req->name;
        $segment->update();
        return redirect()->route('segment.browse');
    }
    function delete(Request $req){
        $segment=Segment::find($req->segment_id);
        $segment->delete();
        return redirect()->back();
    }
}

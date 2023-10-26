<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
class DepartmentController extends Controller
{
    function browse(){
        $departments=Department::all();
        return view('admin.screens.department.browse',['departments'=>$departments]);
    }
    function add(){
        return view('admin.screens.department.add');
    }
    function save(Request $req){
        $department=new Department();
        $department->name=$req->name;
        $department->save();
        return redirect()->route('department.browse');
    }
    function edit(Request $req){
        $department=Department::find($req->department_id);
        return view('admin.screens.department.edit',['department'=>$department]);
    }
    function update(Request $req){
        $department=Department::find($req->department_id);
        $department->name=$req->name;
        $department->update();
        return redirect()->route('department.browse');
    }
    function delete(Request $req){
        $department=Department::find($req->department_id);
        $department->delete();
        return redirect()->back();
    }
}

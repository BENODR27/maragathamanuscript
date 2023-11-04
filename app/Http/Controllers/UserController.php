<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function browse(){
        $users=User::all()->reverse();
        return view('admin.screens.user.browse',['users'=>$users]);
    }
    function edit(Request $req){
        $user=User::find($req->user_id);
        $user->address=json_decode($user->address);
        return view('admin.screens.user.edit',['user'=>$user,'address'=>$user->address]);
    }
    function update(Request $req){
        $user=User::find($req->user_id);
        
        $user->update();
        return redirect()->route('user.browse');
    }
    function delete(Request $req){
        $user=User::find($req->user_id);
        $user->delete();
        return redirect()->back();
    }
}

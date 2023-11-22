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
        if($user->address==null){
            $user->address = json_decode(json_encode([
                'door_no' => "",
                'street_name' => "",
                'locality_landmark' => "",
                'district' => "",
                'state' => "",
                'country' => "",
                'pincode' => "",
            ]));
        }else{
            $user->address=json_decode($user->address);
        }
       
        return view('admin.screens.user.edit',['user'=>$user,'address'=>$user->address]);
    }
    function update(Request $req){
        $user=User::find($req->user_id);
        $user->name=$req->name;
        $user->email=$req->email;
        $user->mobile_number=$req->mobile_number;
        $user->language=$req->language;
        $user->address = json_encode([
            'door_no' => $req->door_no,
            'street_name' => $req->street_name,
            'locality_landmark' => $req->input('locality_landmark'),
            'district' => $req->input('district'),
            'state' => $req->input('state'),
            'country' => $req->input('country'),
            'pincode' => $req->input('pincode'),
        ]);
        $user->update();
        return redirect()->route('user.browse');
    }
    function view(Request $req){
        $user=User::find($req->user_id);
        if($user->address==null){
            $user->address = json_decode(json_encode([
                'door_no' => "",
                'street_name' => "",
                'locality_landmark' => "",
                'district' => "",
                'state' => "",
                'country' => "",
                'pincode' => "",
            ]));
        }else{
            $user->address=json_decode($user->address);
        }
        return view('admin.screens.user.view',['user'=>$user,'address'=>$user->address]);
    }
    function delete(Request $req){
        $user=User::find($req->user_id);
        $user->delete();
        return redirect()->back();
    }
    function useStatusToggle(Request $req){
        $user=User::find($req->user_id);
        $user->account_status=$user->account_status?false:true;
        $user->save();
        return redirect()->back();
      }
}

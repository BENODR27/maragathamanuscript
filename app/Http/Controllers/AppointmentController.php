<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

use App\Notifications\UserNotification;
class AppointmentController extends Controller
{
    function list(){
        $user=Auth::user();
        $appointments=Appointment::where('user_id',$user->id)->get()->reverse();
        return view('website.screens.appointment.list',['appointments'=>$appointments,'pageTitle'=>"MY APPOINTMENTS"]);
    }
    function add(){
        return view('website.screens.appointment.add',['pageTitle'=>"NEW APPOINTMENT"]);
    }
    function save(Request $req){
        $req->validate([
            'for' => 'required|string|max:255',
            'mode' => 'required|string|max:255',
            'dateandtime' => 'required|date',
            'terms' => 'required|accepted', // Assuming 'terms' is a checkbox field
        ], [
            'terms.accepted' => 'Please accept the terms and conditions.',
        ]);

        $appointment=new Appointment();
        $appointment->author_name=Auth::user()->name;
        $appointment->for=$req->for;
        $appointment->mode=$req->mode;
        $appointment->dateandtime=$req->dateandtime;
        $appointment->terms=true;
        $appointment->user_id=Auth::user()->id;
        $appointment->save();
        $user=Auth::user();		
        $message= "Appointment submitted sucessfully" ;
        $messagetone="success";
        $custommessage="";
		Notification::send($user,new UserNotification($message,$messagetone,$custommessage));
        return redirect()->route('appointment.list')->with(['msg'=>"Appointment requested successfully kindly wait for confirmation",'status'=>'Success']);
    }
    function browse(Request $req){
        if($req->filter=="pending"){
            $appointments=Appointment::where('status',false)->get()->reverse();
        }
        if($req->filter=="accepted"){
            $appointments=Appointment::where('status',true)->get()->reverse();
        }
        if($req->filter=="all"){
            $appointments=Appointment::all()->reverse();
        }
        return view('admin.screens.appointment.browse',['appointments'=>$appointments]);
    }
    function view(Request $req){
        $appointment=Appointment::find($req->appointment_id);
        return view('admin.screens.appointment.view',['appointment'=>$appointment]);
    }
    function toggleStatus(Request $req){
        $req->validate([
            'status' => 'required|string|max:10',
        ]);
        $appointment=Appointment::find($req->appointment_id);
        if($req->status=="Accept"){
            $appointment->status=true;
        }else{
            $appointment->status=false;
        }
        $appointment->update();
        
        $user=User::find($appointment->user_id);		
        $message= "Your Appointment Scheduled For ".$appointment->dateandtime." Got ".($req->status?" Accepted":"Rejected") ;
        $messagetone=($req->status=="Accept"?"success":"error");
        $custommessage="";
		Notification::send($user,new UserNotification($message,$messagetone,$custommessage));
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Auth;
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
        $appointment=new Appointment();
        $appointment->author_name=$req->author_name;
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
        return redirect()->route('appointment.list')->with(['msg'=>"successfully added"]);
    }
    function browse(){
        $appointments=Appointment::all()->reverse();
        return view('admin.screens.appointment.browse',['appointments'=>$appointments]);
    }
    function toggleStatus(Request $req){
        $appointment=Appointment::find($req->appointment_id);
        $appointment->status=($appointment->status)?false:true;
        $appointment->update();
        $user=Auth::user();		
        $message= "Your Appointment Scheduled For ".$appointment->dateandtime." Got ".($appointment->status?" Accepted":"Rejected") ;
        $messagetone=($appointment->status?"success":"error");
        $custommessage="";
		Notification::send($user,new UserNotification($message,$messagetone,$custommessage));
        return redirect()->back();
    }
}

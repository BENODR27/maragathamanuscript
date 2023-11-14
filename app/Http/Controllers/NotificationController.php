<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

use Illuminate\Support\Facades\Notification;
use App\Notifications\UserNotification;

class NotificationController extends Controller
{
    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
    function sendNotificationMessage(Request $req){
       
        $user=User::where('role','!=','admin')->get();		
        $message= $req->message;
        $messagetone=$req->notification_type;
        $custommessage=$req->custom_url;
		Notification::send($user,new UserNotification($message,$messagetone,$custommessage));
        return redirect()->back();
    }
    function viewNotificationMessagePage(Request $req){
        return view('admin.screens.notification.send');
    }
}

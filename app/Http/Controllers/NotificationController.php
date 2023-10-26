<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class NotificationController extends Controller
{
    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}

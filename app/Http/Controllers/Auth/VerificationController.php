<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function redirectPath(){
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '3'){
            return route('admin.announcements.index');
        }
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){
            return route('admin.announcements.index');
        }
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '1'){
            return route('admin.announcements.index');
        }
       

    }
}

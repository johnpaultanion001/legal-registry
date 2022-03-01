<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
   
    use ResetsPasswords;


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

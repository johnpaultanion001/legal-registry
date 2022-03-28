<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{


    use AuthenticatesUsers;

  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath(){
       
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '1'){
            return route('admin.library.library_index');
        }
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){
            return route('admin.client.questionnaire_index');
        }
       

    }
}

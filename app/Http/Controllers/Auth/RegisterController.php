<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Client;
use App\Models\Clinic;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use File;

class RegisterController extends Controller
{
  
    use RegistersUsers;

  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
            [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string' ,'confirmed'
                                ,'min:8'],
            ]);
        
    }

    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        

        RoleUser::insert([
            'user_id' => $user->id,
            'role_id' => 2,
        ]);

        return $user;
        
        
    }

    public function redirectPath(){
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){
            return route('admin.client.questionnaire_index');
        }
    }
}

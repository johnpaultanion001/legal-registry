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
        $user_type      = $data['user_type'];

        if($user_type == 'Client'){
            return Validator::make($data,
             [
                'name'   => ['required'],
                'contact_number'   => ['required','unique:clients', 'numeric' ],
                'address'   => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string' ,'confirmed'
                                ,'min:8'],
            ]);
        }
        else if($user_type == 'Clinic'){
            return Validator::make($data,
             [
                'name'   => ['required'],
                'contact_number'   => ['required','unique:clients', 'numeric' ],
                'address'   => ['required'],
                'lat'   => ['required'],
                'lng'   => ['required'],
                'business_permit' =>  ['required' , 'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string' ,'confirmed'
                                ,'min:8'],
            ]);
        }
        
    }

    protected function create(array $data)
    {
        $user_type      = $data['user_type'];

        if($user_type == 'Client'){
            $user = User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'isApproved' => 1,
            ]);
            
            Client::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'address' => $data['address'],
                'contact_number' => $data['contact_number'],
            ]);
    
            RoleUser::insert([
                'user_id' => $user->id,
                'role_id' => 3,
            ]);
    
            return $user;
        }
        else if($user_type == 'Clinic'){
            $user = User::create([
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            
            $permit = $data['business_permit'];
            $extension = $permit->getClientOriginalExtension(); 
            $file_name_to_save = time()."_".$user->id.".".$extension;
            $permit->move('assets/images/business_permit/', $file_name_to_save);

            Clinic::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'address' => $data['address'],
                'contact_number' => $data['contact_number'],
                'lat' => $data['lat'],
                'lng' => $data['lng'],
                'business_permit' => $file_name_to_save,
            ]);
    
            RoleUser::insert([
                'user_id' => $user->id,
                'role_id' => 2,
            ]);
    
            return $user;
        }
        
    }

    public function redirectPath(){
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '3'){
            return route('admin.announcements.index');
        }
        if(auth()->user()->roles()->pluck('id')->implode(', ') == '2'){
            return route('admin.announcements.index');
        }
    }
}

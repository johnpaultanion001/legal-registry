<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\Client;
use App\Models\Client_TOI;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use File;

class UsersController extends Controller
{

    public function account_update(Request $request){
       
            $validated =  Validator::make($request->all(), [
                'name'   => ['required'],
                'contact_number' => ['required', 'string', 'min:8','max:11'],
                'address'   => ['required'],
            ]);
            if ($validated->fails()) {
                return response()->json(['errors' => $validated->errors()]);
            }

            $client = Client::updateOrCreate(
                [
                    'user_id'      => auth()->user()->id,
                ],
                [
                    'name'  => $request->input('name'),
                    'contact_number'  => $request->input('contact_number'),
                    'address'  => $request->input('address'),
                    'user_id'      => auth()->user()->id,
                ]
            );
            User::find(auth()->user()->id)->update([
                'isComplete'  => true,
            ]);
            if($request->input('type_of_industry') == null){
                return response()->json(['no_selected' => 'At least one INDUSTRY TYPE must be selected.']);
            }
            Client_TOI::where('client_id', $client->id)
                        ->whereNotIn('type_of_industry_id', $request->input('type_of_industry'))
                        ->delete();
            foreach($request->input('type_of_industry') as $ids )
            {
                Client_TOI::updateOrCreate(
                    [
                        'client_id'    => $client->id,
                        'type_of_industry_id' => $ids,
                    ],
                    [
                        'client_id'    => $client->id,
                        'type_of_industry_id' => $ids,
                    ]
                );
            }
           
        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function changepassword()
    {
        return view('client.change_password.change_password');

    }
    public function passwordupdate(Request $request , User $user){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'current_password' => ['required',new MatchOldPassword],
            'new_password' => ['required','min:8'],
            'confirm_password' => ['required','same:new_password'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($user->id)->update([
            'password' => Hash::make($request->input('new_password')),
          
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }

}

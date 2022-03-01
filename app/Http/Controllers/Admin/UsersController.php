<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = RoleUser::whereIn('role_id',['1','2'])->get();

        return view('administration.accounts.accounts', compact('accounts'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'firstname'             => ['required'],
            'lastname'              => ['required'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number'         => ['required'],
            'password'              => ['required', 'string', 'min:8'],
            'role'                  => ['required'],
        
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $account = User::create([
            'firstname'  => $request->input('firstname'),
            'lastname'  => $request->input('lastname'),
            'email'  => $request->input('email'),
            'mobile_number'  => $request->input('mobile_number'),
            'password' => Hash::make($request->input('password')),
            'isRegistered'          => 1,
            'email_verified_at'     => date("Y-m-d H:i:s"),
        ]);
        RoleUser::insert([
            'user_id' => $account->id,
            'role_id' => $request->input('role'),
        ]);
        return response()->json(['success' => 'Added Successfully.']);

    }

    public function edit(User $account)
    {
        $role = RoleUser::where('user_id', $account->id)->first();

        if (request()->ajax()) {
            return response()->json([
                'firstname'          => $account->firstname,
                'lastname'           => $account->lastname,
                'email'              => $account->email,
                'mobile_number'      => $account->mobile_number,
                'role'               => $role->role_id,
            ]);
        }
    }

    public function update(Request $request, User $account)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'firstname'             => ['required'],
            'lastname'              => ['required'],
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users,email,' .$account->id,],
            'mobile_number'         => ['required'],
        
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($account->id)->update([
            'firstname'  => $request->input('firstname'),
            'lastname'  => $request->input('lastname'),
            'email'  => $request->input('email'),
            'mobile_number'  => $request->input('mobile_number'),
            'password' => Hash::make($request->input('password')),
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }

   

    public function destroy(User $account)
    {
        RoleUser::where('user_id',$account->id)->delete();
        return response()->json(['success' => $account->delete()]);
    }

    public function changepassword()
    {
        return view('admin.change_password.change_password');

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

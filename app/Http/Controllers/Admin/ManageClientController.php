<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RoleUser;
use App\Models\Client;
use App\Models\User;
use App\Models\QuestionForm;
use File;

class ManageClientController extends Controller
{
    public function manage_client_index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $clients = RoleUser::where('role_id', 2)->first();
        return redirect('/admin/manage_client/'.$clients->user_id);
    }
    public function manage_client($user_id)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $clients         = RoleUser::where('role_id', 2)->get();
        $client1         = Client::where('user_id', $user_id)->first();
        return view('admin.client.manage_client', compact('clients','client1'));
    }
    public function account_status(Request $request){
        $user_id = $request->get('user_id');
        $user = User::where('id', $user_id)->first();

        if($user->isActivate == 1){
            $user->update([
                'isActivate'     =>  0,
            ]);
        }
        elseif($user->isActivate == 0){
            $user->update([
                'isActivate'     =>  1,
            ]);
        }
        return response()->json(['success'=>'Successfully Updated']);
    }

    public function update_client(Request $request, $user_id)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required'],
            'contact_number' => ['required', 'string', 'min:8','max:11'],
            'email' => ['email' , 'unique:users,email,'.$user_id],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Client::where('user_id', $user_id)->update([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'contact_number' => $request->get('contact_number'),
        ]);
        User::where('id', $user_id)->update([
            'email' => $request->get('email'),
        ]);

        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function defaultPassowrd(User $user_id)
    {
        User::find($user_id->id)->update([
            'password' => '$2y$10$zPiaTbYwkxYcejFmEimhWedeAogTJvEb/yGmBVx390ihhPFy8r896' , //password,
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }
    public function clear_form(User $user_id)
    {
        $question_forms = QuestionForm::where('client_id',$user_id->client->id)->get();
        foreach($question_forms as $answer){
            File::delete(public_path('assets/file_remarks/'.$answer->file_remarks));
            $answer->delete();
        }
        return response()->json(['success' => 'Clear Successfully.']);
    }
    
}

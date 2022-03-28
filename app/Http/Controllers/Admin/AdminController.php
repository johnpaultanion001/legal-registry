<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Client;
use App\Models\User;
use App\Models\TypeOfIndustry;
use App\Models\TypeOfTradeAct;
use App\Models\SubtitleOfLaw;
use App\Models\TitleOfLaw;
use App\Models\TOI_TOTA;
use App\Models\RoleUser;
use File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function library_index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $industry = TypeOfIndustry::latest()->first();
        return redirect('/admin/library_index/'.$industry->id);
    }
    public function library(TypeOfIndustry $industry_id)
    {
        $industries = TypeOfIndustry::latest()->get();
        return view('admin.library.library', compact('industries','industry_id'));
    }
    public function store_industry(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title_industry' => ['required'],
            'type_of_trade_act' => ['required'],
            'subtitle_of_law' => ['required'],
            'file_type_of_trade_act' =>  ['required', 'max:2040'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $pdf = $request->file('file_type_of_trade_act');
        $extension = $pdf->getClientOriginalExtension(); 
        $file_name_to_save = $request->input('type_of_trade_act').time().".".$extension;
        $pdf->move('assets/pdf/', $file_name_to_save);

        $industry = TypeOfIndustry::create([
            'title' => $request->input('title_industry'),
        ]);
        $trade_act = TypeOfTradeAct::create([
            'title' => $request->input('type_of_trade_act'),
            'file'  => $file_name_to_save,
        ]);
        TOI_TOTA::create([
            'type_of_industry_id'  => $industry->id,
            'type_of_trade_act_id' => $trade_act->id,
        ]);
        $subtitle = SubtitleOfLaw::create([
            'type_of_trade_act_id'  => $trade_act->id,
            'title' => $request->input('subtitle_of_law'),
        ]);
        
        foreach($request->input('title_of_law') as $title_of_law )
        {
            TitleOfLaw::create(
                [
                    'type_of_trade_act_id'    => $trade_act->id,
                    'subtitle_of_law_id'      => $subtitle->id,
                    'title'                   => $title_of_law,
                ]
            );
        }

        return response()->json(['success' => 'Successfully Added Record.']);
    }
    public function type_of_trade_act_dd(Request $request){
        
        $toi_tota = TOI_TOTA::where('type_of_industry_id', $request->get('id_industry'))->get();

        foreach($toi_tota as $act){
            $type_of_trades[] = array(
                'id'           => $act->type_of_trade_act->id,
                'title'        => $act->type_of_trade_act->title, 
            );
        }
      

        return response()->json([
            'type_of_trades'  => $type_of_trades,
        ]);
    }

    public function subtitle_of_law_dd(Request $request){
        
        $subtitles = SubtitleOfLaw::where('type_of_trade_act_id', $request->get('id_type_of_trade'))
                        ->orderBy('title', 'asc')->get();

        foreach($subtitles as $title){
            $subtitle_of_laws[] = array(
                'id'           => $title->id,
                'title'        => $title->title, 
            );
        }
      

        return response()->json([
            'subtitle_of_laws'  => $subtitle_of_laws,
        ]);
    }
    public function edit_industry(Request $request){
        
        $industry = TypeOfIndustry::where('id', $request->get('id_industry'))->first();

        return response()->json([
            'title_industry'  => $industry->title,
        ]);
    }
    public function title_of_laws(Request $request){

        $titles = TitleOfLaw::where('type_of_trade_act_id', $request->get('id_type_of_trade'))
                                ->where('subtitle_of_law_id', $request->get('id_subtitle'))->get();
        if($titles == null){
            return response()->json([
                'no_data'  => 'no_data',
            ]);
        }
        foreach($titles as $title){
            $title_of_laws[] = array(
                'title'        => $title->title, 
            );
        }
        return response()->json([
            'title_of_laws'  => $title_of_laws,
        ]);
    }
    public function update_industry(Request $request, TypeOfIndustry $industry)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title_industry' => ['required'],
            'type_of_trade_act_dd' => ['required'],
            'subtitle_of_law_dd' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $industry->update([
            'title' => $request->input('title_industry'),
        ]);

        TitleOfLaw::where('type_of_trade_act_id', $request->input('type_of_trade_act_dd'))
                    ->where('subtitle_of_law_id', $request->input('subtitle_of_law_dd'))
                    ->whereNotIn('title', $request->input('title_of_law'))
                    ->delete();
                    
        foreach($request->input('title_of_law') as $title_of_law )
        {
            TitleOfLaw::updateOrCreate(
                [
                    'type_of_trade_act_id'    => $request->input('type_of_trade_act_dd'),
                    'subtitle_of_law_id'      => $request->input('subtitle_of_law_dd'),
                    'title'                   => $title_of_law,
                ],
                [
                    'type_of_trade_act_id'    => $request->input('type_of_trade_act_dd'),
                    'subtitle_of_law_id'      => $request->input('subtitle_of_law_dd'),
                    'title'                   => $title_of_law,
                ]
            );
        }

        return response()->json(['success' => 'Successfully Updated Record.']);
    }

    public function type_of_trade(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'type_of_trade_act' => ['required'],
            'file_type_of_trade_act' =>  ['required','max:2040'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        $pdf = $request->file('file_type_of_trade_act');
        $extension = $pdf->getClientOriginalExtension(); 
        $file_name_to_save = $request->input('type_of_trade_act').time().".".$extension;
        $pdf->move('assets/pdf/', $file_name_to_save);

        $trade_act = TypeOfTradeAct::create(
            [
                'title' => $request->input('type_of_trade_act'),
                'file'  => $file_name_to_save,
            ]
        );
        TOI_TOTA::create(
            [
                'type_of_industry_id'  => $request->input('hidden_id_industry'),
                'type_of_trade_act_id' => $trade_act->id,
            ]
        );
        return response()->json(['success' => 'Added Record.']);
    }
    public function type_of_trade_update(Request $request, TypeOfTradeAct $type_of_trade)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'type_of_trade_act' => ['required'],
            'file_type_of_trade_act' =>  ['max:2040'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if ($request->file('file_type_of_trade_act')) {
            File::delete(public_path('assets/pdf/'.$type_of_trade->file));
            $pdf = $request->file('file_type_of_trade_act');
            $extension = $pdf->getClientOriginalExtension(); 
            $file_name_to_save = $request->input('type_of_trade_act').time().".".$extension;
            $pdf->move('assets/pdf/', $file_name_to_save);
            $type_of_trade->file = $file_name_to_save;
        }
        
        $type_of_trade->title = $request->input('type_of_trade_act');
        $type_of_trade->save();;
        

        return response()->json(['success' => 'Update Record.']);
    }
    public function type_of_trade_destroy(TypeOfTradeAct $type_of_trade)
    {
        
    }
    
    public function edit_type_of_trade(TypeOfTradeAct $type_of_trade)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $type_of_trade]);
        }
    }

    public function subtitle_of_law(Request $request, $type_of_trade){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'subtitle_of_law' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        SubtitleOfLaw::updateOrCreate(
            [
                'type_of_trade_act_id'     => $type_of_trade,
                'id'                       => $request->input('hidden_subtitle_of_law_id'),
            ],
            [
                'type_of_trade_act_id'     => $type_of_trade,
                'title'                    => $request->input('subtitle_of_law'),
            ]
        );
        return response()->json(['success' => 'Update Record.']);
    }
    public function edit_subtitle_of_law(SubtitleOfLaw $subtitle_of_law)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $subtitle_of_law]);
        }
    }
    public function add_admin()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accounts = RoleUser::whereIn('role_id',['1'])->get();

        return view('admin.add_admin.admin', compact('accounts'));
    }
    public function edit_admin(User $account)
    {
        $role = RoleUser::where('user_id', $account->id)->first();

        if (request()->ajax()) {
            return response()->json([
                'email'              => $account->email,
            ]);
        }
    }

    public function store_admin(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $account = User::create([
            'email'  => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'isComplete'          => 1,
            'isActivate'          => 1,
            'email_verified_at'     => date("Y-m-d H:i:s"),
        ]);
        RoleUser::insert([
            'user_id' => $account->id,
            'role_id' => 1,
        ]);
        return response()->json(['success' => 'Added Successfully.']);

    }
    public function update_admin(Request $request, User $account)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users,email,' .$account->id,],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        User::find($account->id)->update([
            'email'  => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return response()->json(['success' => 'Updated Successfully.']);
    }

   

    public function destroy_admin(User $account)
    {
        RoleUser::where('user_id',$account->id)->delete();
        return response()->json(['success' => $account->delete()]);
    }

    public function destroy_industry(TypeOfIndustry $industry)
    {
        return response()->json(['success' => $industry->delete()]);
    }
    

    
    
}

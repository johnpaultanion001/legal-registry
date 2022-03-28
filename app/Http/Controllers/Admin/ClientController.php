<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Client_TOI;
use App\Models\TOI_TOTA;
use App\Models\TypeOfIndustry;
use App\Models\QuestionForm;
use Illuminate\Http\Request;
use Validator;
use Gate;
use File;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function questionnaire_index(){
        $first_type_industry = auth()->user()->client->industries()->first();
        return redirect('/admin/client/questionnaire/'.$first_type_industry->type_of_industry_id);
    } 
    
    public function questionnaire($industry_id)
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $client_toi = Client_TOI::where('client_id', auth()->user()->client->id)
                                        ->where('type_of_industry_id', $industry_id)
                                        ->first();
        if($client_toi != null){
            return view('client.questionnaire.questionnaire', compact('client_toi'));
        }else{
            $first_type_industry = auth()->user()->client->industries()->first();
            return redirect('/admin/client/questionnaire/'.$first_type_industry->type_of_industry_id);
        }
    }
 
    public function questionnaire_answer(Request $request)
    {
        $existing_data = QuestionForm::where('client_id', auth()->user()->client->id)
                            ->where('title_of_law_id', $request->get('law_id'))
                            ->first();

        if($existing_data == null){
            if($request->file('file_remarks')){
                $pdf = $request->file('file_remarks');
                $extension = $pdf->getClientOriginalExtension(); 
                $file_name_to_save = time().".".$extension;
                $pdf->move('assets/file_remarks/', $file_name_to_save);
            }else{
                $file_name_to_save = '';
            }
        }else{
            if($request->file('file_remarks')){
                File::delete(public_path('assets/file_remarks/'.$existing_data->file_remarks));
                $pdf = $request->file('file_remarks');
                $extension = $pdf->getClientOriginalExtension(); 
                $file_name_to_save = time().".".$extension;
                $pdf->move('assets/file_remarks/', $file_name_to_save);
            }else{
                $file_name_to_save = $existing_data->file_remarks;
            }
        }                   
        
        

        QuestionForm::updateOrCreate(
            [
                'client_id'        => auth()->user()->client->id,
                'title_of_law_id'  => $request->get('law_id'),
            ],
            [
                'applicability'       => $request->get('applicability'),
                'iywd'                => $request->get('iywd'),
                'compliance_status'   => $request->get('compliance_status'),
                'remarks'             => $request->get('remarks'),
                'rpdhn'               => $request->get('rpdhn'),
                'file_remarks'        => $file_name_to_save,
            ],
        );
        return response()->json(['success' => '']);
    }
    public function laws_index(){
        $first_type_industry = auth()->user()->client->industries()->first();
        return redirect('/admin/client/legal_compliance_laws/'.$first_type_industry->type_of_industry_id);
    } 
    public function laws($industry_id)
    {
        $client_toi = Client_TOI::where('client_id', auth()->user()->client->id)
                                        ->where('type_of_industry_id', $industry_id)
                                        ->first();
        if($client_toi != null){
            return view('client.laws.laws', compact('client_toi'));
        }else{
            $first_type_industry = auth()->user()->client->industries()->first();
            return redirect('/admin/client/questionnaire/'.$first_type_industry->type_of_industry_id);
        }
    }
}

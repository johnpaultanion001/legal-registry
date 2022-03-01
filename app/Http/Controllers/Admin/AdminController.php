<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Clinic;
use App\Models\Client;
use App\Models\Service;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;


class AdminController extends Controller
{
    public function clinics()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $clinics = Clinic::latest()->get();
        return view('admin.admin.all_clinics.clinics', compact('clinics'));
    }
    public function clients()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $clients = Client::latest()->get();
        return view('admin.admin.all_clients.clients', compact('clients'));
    }

    public function approved(Request $request){
        $clinic = Clinic::where('id', $request->get('clinic_id'))->first();
        $user = User::where('id', $clinic->user_id)->first();

        if($user->isApproved == 0){
            $user->update([
                'isApproved'  => 1
            ]);
            $clinic->update([
                'isApproved'  => 1
            ]);
        }
        elseif($user->isApproved == 1){
            $user->update([
                'isApproved'  => 0
            ]);
            $clinic->update([
                'isApproved'  => 0
            ]);
        }

        return response()->json(['success' => 'UPDATED']);
    }

    public function appointments()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $appointments = Appointment::latest()->get();
        return view('admin.admin.all_appointments.appointments', compact('appointments'));
    }
    public function change_status(Request $request){
        $appointment = Appointment::where('id',$request->get('id'))->first();
        if($appointment->status == 'PENDING'){
            $appointment->update([
                'status'    => 'APPROVED'
            ]);
        }
        elseif($appointment->status == 'APPROVED'){
            $appointment->update([
                'status'    => 'COMPLETED'
            ]);
        }
        elseif($appointment->status == 'COMPLETED'){
            $appointment->update([
                'status'    => 'CANCELED'
            ]);
        }
        elseif($appointment->status == 'CANCELED'){
            $appointment->update([
                'status'    => 'PENDING'
            ]);
        }

        return response()->json(['success' => 'UPDATED']);
    }
}

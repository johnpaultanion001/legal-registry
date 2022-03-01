<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Service;
use Validator;

class AppointmentController extends Controller
{
    
    public function form(Request $request)
    {
        if($request->get('form_type') == "ADD"){
            $service_id = $request->get('service');
            $service = Service::where('id', $service_id)->first();
            $clinic  = Clinic::where('id', $service->clinic_id)->first();
            return response()->json([
                'services'                => $clinic->services()->get(),
                'doctors'                 => $clinic->doctors()->get(),
                'clinic'                  => $clinic->name,
                'service_id'              => $service_id,
            ]);
        }if($request->get('form_type') == "EDIT"){
            $appointment_id = $request->get('appointment');
            
            $appoitment = Appointment::where('id', $appointment_id)->first();
            return response()->json([
                'services'                => $appoitment->clinic->services()->get(),
                'doctors'                 => $appoitment->clinic->doctors()->get(),
                'clinic'                  => $appoitment->clinic->name,
                'service_id'              => $appoitment->service_id,
                'doctor_id'               => $appoitment->doctor_id,
                'date'                    => $appoitment->date,
                'time'                    => $appoitment->time,
                'note'                    => $appoitment->note,
            ]);
        }
        
    }

    public function index()
    {
        $appoitments = Appointment::where('user_id', auth()->user()->id)->latest()->get();
        return view('admin.appointments.appointments', compact('appoitments'));
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'service' => ['required'],
            'doctor'  => ['required'],
            'date' => ['required','after:today'],
            'time' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $service = Service::where('id', $request->input('service'))->first();

        Appointment::create([
            'user_id'       =>  auth()->user()->id,
            'clinic_id'     =>  $service->clinic_id,
            'service_id'    =>  $request->input('service'),
            'doctor_id'     =>  $request->input('doctor'),
            'date'          =>  $request->input('date'),
            'time'          =>  $request->input('time'),
            'note'          =>  $request->input('note'),
        ]);
        
      
        return response()->json(['success' => 'Thank You for a Successful Appointment. Please wait for the Clinic response.']);
    }

    public function update(Request $request, Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'service' => ['required'],
            'doctor'  => ['required'],
            'date' => ['required','after:today'],
            'time' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Appointment::find($appointment->id)->update([
            'service_id'    =>  $request->input('service'),
            'doctor_id'     =>  $request->input('doctor'),
            'date'          =>  $request->input('date'),
            'time'          =>  $request->input('time'),
            'note'          =>  $request->input('note'),
        ]);

        return response()->json(['success' => 'Appointment was successfully Updated.']);
    }

    public function destroy(Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');

        Appointment::find($appointment->id)->update([
            'status'    =>  'CANCELED',
        ]);

        return response()->json(['success' => 'Appointment was successfully Canceled.']);
    }

}

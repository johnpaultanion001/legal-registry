<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use File;

class ClinicController extends Controller
{
    public function appointments()
    {
        abort_if(Gate::denies('clinic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $appointments = Appointment::where('clinic_id', auth()->user()->clinic->id)->latest()->get();
        return view('admin.clinic.manage_appointments.appointments', compact('appointments'));
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

    public function doctors()
    {
        abort_if(Gate::denies('clinic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $doctors = Doctor::where('clinic_id', auth()->user()->clinic->id)->latest()->get();
        return view('admin.clinic.manage_doctors.doctors', compact('doctors'));
    }

    public function services(){
        abort_if(Gate::denies('clinic_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $services = Service::where('clinic_id', auth()->user()->clinic->id)->latest()->get();
        return view('admin.clinic.manage_services.services', compact('services'));
    }
    public function services_store(Request $request){
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Service::create([
            'clinic_id'     =>  auth()->user()->clinic->id,
            'name'          =>  $request->input('name'),
            'description'   =>  $request->input('description'),
        ]);
        
      
        return response()->json(['success' => 'Successfully Added Record.']);
    }

    public function services_update(Request $request, Service $service){
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        Service::find($service->id)->update([
            'name'          =>  $request->input('name'),
            'description'   =>  $request->input('description'),
        ]);
        
      
        return response()->json(['success' => 'Updated Successfully.']);
    }

    public function services_edit(Service $service)
    {
        if (request()->ajax()) {
            return response()->json(['result' => $service]);
        }
    }

    public function services_destroy(Service $service)
    {
        $service->delete();
        return response()->json(['success' =>  'Removed Successfully.']);
    }

    public function doctors_store(Request $request){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
            'contact_number' => ['required'],
            'medical_license_image' =>  ['required' , 'mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }


        $imgs = $request->file('medical_license_image');
        $extension = $imgs->getClientOriginalExtension(); 
        $file_name_to_save = time()."_".auth()->user()->clinic->id.".".$extension;
        $imgs->move('assets/images/medical_license/', $file_name_to_save);

        Doctor::create([
            'clinic_id' => auth()->user()->clinic->id,
            'name' => $request->input('name'),
            'contact_number' => $request->input('contact_number'),
            'medical_license' => $file_name_to_save,
        ]);

        return response()->json(['success' => 'Successfully Added Record.']);
    }

    public function doctors_edit(Doctor $doctor)
    {
        if (request()->ajax()) {
            return response()->json(['result' =>  $doctor]);
        }
    }

    public function doctors_update(Request $request, Doctor $doctor)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'name' => ['required'],
            'contact_number' => ['required'],
            'medical_license_image' =>  ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],

        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }


        if ($request->file('medical_license_image')) {
            File::delete(public_path('assets/images/medical_license/'.$doctor->medical_license));
            $imgs = $request->file('medical_license_image');
            $extension = $imgs->getClientOriginalExtension(); 
            $file_name_to_save = time()."_".auth()->user()->clinic->id.".".$extension;
            $imgs->move('assets/images/medical_license/', $file_name_to_save);
            $doctor->medical_license = $file_name_to_save;
        }
       
        $doctor->name = $request->name;
        $doctor->contact_number = $request->contact_number;
        $doctor->save();

        return response()->json(['success' => 'Updated Successfully.']);
    }
    public function doctors_destroy(Doctor $doctor)
    {
        File::delete(public_path('assets/images/medical_license/'.$doctor->medical_license));
        $doctor->delete();
        return response()->json(['success' =>  'Removed Successfully.']);
    }
    

   
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Service;
use Validator;

class FinderClinicContoller extends Controller
{
    public function index()
    {
        $clinics = Clinic::orderBy('name', 'asc')->where('isApproved', 1)->get();
        return view('admin.finder_clinic.finder_clinic' , compact('clinics'));
    }

    public function search(Request $request){
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'search' => ['required'],
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }
        $list_clinics  = Clinic::orderBy('name', 'asc')
                            ->where('isApproved', 1)
                            ->where('address', 'LIKE','%'.$request->input('search')."%")
                            ->orWhere('name', 'LIKE','%'.$request->input('search')."%")
                            ->get();
       
        foreach($list_clinics as $clinic){
            $clinics[] = array(
                'id'           => $clinic->id,
                'name'         => $clinic->name, 
                'contact_number'         => $clinic->contact_number, 
                'address'         => $clinic->address, 
                'lat'         => $clinic->lat, 
                'lng'         => $clinic->lng, 
                'services'     => $clinic->services()->get(),
            );
        }
      

        return response()->json([
            'clinics'  => $clinics,
        ]);

   }
}

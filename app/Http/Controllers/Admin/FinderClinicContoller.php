<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Service;

class FinderClinicContoller extends Controller
{
    public function index()
    {
        $clinics = Clinic::orderBy('name', 'asc')->where('isApproved', 1)->get();
        return view('admin.finder_clinic.finder_clinic' , compact('clinics'));
    }
}

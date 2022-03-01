<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use File;
use Validator;

class AnnouncementController extends Controller
{
    
    public function index()
    {
        if(auth()->user()->roles()->pluck('id')->implode(', ') == 1){
            $announcements = Announcement::latest()->get();
        }
        else if(auth()->user()->roles()->pluck('id')->implode(', ') == 2){
            $announcements = Announcement::whereIn('for',['CLINIC', 'ALL'])->latest()->get();
        }
        else if(auth()->user()->roles()->pluck('id')->implode(', ') == 3){
            $announcements = Announcement::whereIn('for',['CLIENT', 'ALL'])->latest()->get();
        }
        
        return view('admin.announcements.announcements', compact('announcements'));
    }



    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'for' => ['required'],
            'announcement_image' =>  ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }

        if ($request->file('announcement_image')) {
            $imgs = $request->file('announcement_image');
            $extension = $imgs->getClientOriginalExtension(); 
            $file_name_to_save = time()."_".auth()->user()->id.".".$extension;
            $imgs->move('assets/images/announcements/', $file_name_to_save);
        }
        Announcement::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $file_name_to_save ?? '',
            'link_website' => $request->input('link_website'),
            'for' => $request->input('for'),
        ]);

        return response()->json(['success' => 'Successfully Added Record.']);
    }



    public function edit(Announcement $announcement)
    {
        if (request()->ajax()) {
            return response()->json(['result' =>  $announcement]);
        }
    }

    
    public function update(Request $request, Announcement $announcement)
    {
        date_default_timezone_set('Asia/Manila');
        $validated =  Validator::make($request->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'for' => ['required'],
            'announcement_image' =>  ['mimes:png,jpg,jpeg,svg,bmp,ico', 'max:2040'],
        ]);

        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()]);
        }


        if ($request->file('announcement_image')) {
            File::delete(public_path('assets/images/announcements/'.$announcement->image));
            $imgs = $request->file('announcement_image');
            $extension = $imgs->getClientOriginalExtension(); 
            $file_name_to_save = time()."_".auth()->user()->id.".".$extension;
            $imgs->move('assets/images/announcements/', $file_name_to_save);
            $announcement->image = $file_name_to_save;
        }
       
        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->for = $request->for;
        $announcement->link_website = $request->link_website;

        $announcement->save();

        return response()->json(['success' => 'Updated Successfully.']);
    }

   
    public function destroy(Announcement $announcement)
    {
        File::delete(public_path('assets/images/announcements/'.$announcement->image));
        $announcement->delete();
        return response()->json(['success' =>  'Removed Successfully.']);
    }
}

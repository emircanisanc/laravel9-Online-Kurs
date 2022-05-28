<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function setting()
    {
        $data = Setting::first();
        if($data===null)
        {
            $data = new Setting();
            $data->title = 'Project Title';
            $data->save();
            $data=Setting::first();
        }
        return view('admin.setting', ['data' => $data]);
    }

    public function settingUpdate(Request $request)
    {
        $id = $request->input('id');

        $data = Setting::find($id);
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->company = $request->company;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->fax = $request->fax;
        $data->email = $request->email;
        $data->smtpserver = $request->smtpserver;
        $data->smtpemail = $request->smtpemail;
        $data->smtppassword = $request->smtppassword;
        $data->smtpport = $request->smtpport;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->aboutus = $request->aboutus;
        $data->contact = $_POST['contact'];
        $data->references = $_POST['references'];
        $data->status = $request->status;
        if($request->hasFile('icon'))
        {
            $data->icon = $request->file('icon')->store('images');
        }
        $data->save();
        return redirect()->route('admin.setting');
    }
    
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    public function Index()
    {
        $setting = Setting::find(1);
        return view('backend.setting.setting_show',compact('setting'));
    }

    public function Edit()
    {
        $setting = Setting::find(1);
        return view('backend.setting.setting_edit',compact('setting'));
    }

    public function Update(Request  $request)
    {
        $request->validate([
            'name'=>['required','min:3','max:255'],
            'title' => ['required','min:3','max:255'],
            'email' => ['required','min:4','max:255'],
            'phone' => ['required','max:255'],
            'address' => ['required','min:4','max:400']
        ]);
        Setting::find(1)->update([
            'name'=> $request->name,
            'title' => $request->title,
            'email' => $request->email,
            'phone' => $request->phone,
            'address'=> $request->address
        ]);
        return Redirect('dashboard/setting')->with('success','Setting Update Successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function Index()
    {
        return view('backend.profile.index');
    }

    public function Edit()
    {
        return view('backend.profile.edit');
    }

    public function Update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'profile_photo_path' => ['mimes:jpg,png,jpeg']
        ]);
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->file('profile_photo_path')) {
            $image_url = 'storage/profile_images/'.hexdec(uniqid()).".".$request->file('profile_photo_path')->getClientOriginalExtension();
            Image::make($request->profile_photo_path)->resize(100,100)->save($image_url);
            $user->profile_photo_path = $image_url;
            if(isset(Auth::user()->profile_photo_path)) {
                unlink(public_path(Auth::user()->profile_photo_path));
            }
        }
        $user->save();
        return Redirect('dashboard')->with('success','Profile Update Successfully');
    }
}

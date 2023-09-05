<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    // for show profile page
    public function index(){
        return view('admin.profile.index');
    }

    // for update profile info
    public function updateProfile(Request $request){
        $request->validate([
            'image'  =>  ['image', 'max:2048'],
            'name'  =>  ['required', 'max:100'],
            'email' =>  ['required', 'email', 'unique:users,email,'.Auth::user()->id]
        ]);

        $user = Auth::user();

        // for uploading image
        if($request->hasFile('image')){
            // delete previous image
            if(File::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            // get new image name
            $image = $request->image;
            // generate image name
            $imageName = rand().'_'.$image->getClientOriginalName();
            // upload image in public path
            $image->move(public_path('uploads'), $imageName);
            // storage path for database table
            $path = "/uploads/".$imageName;
            // update image name into database
            $user->image    =   $path;
        }


        // for updating
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // Display an success toast with no title
        toastr()->success('Profile updated successfull');
        // for return
        return redirect()->back();
    }

    // for update password
    public function updatePassword(Request $request){
        // for valitation password fields
        $request->validate([
            'current_password'  =>  ['required', 'current_password'],
            'password'  => ['required', 'confirmed', 'min:8']
        ]);

        // for password update
        $request->user()->update([
            'password'  =>  bcrypt($request->password)
        ]);

        // Display an success toast with no title
        toastr()->success('Password updated successfull');
        // for return
        return redirect()->back();
    }
}

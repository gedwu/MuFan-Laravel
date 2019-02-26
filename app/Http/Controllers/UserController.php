<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile',compact('user'));
    }

    public function update_avatar(Request $request){
        $this->validate($request, [
            'avatar' => 'image|nullable|max:1999',
        ]);

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            $user = Auth::user();

//            @todo: cath errors
            if ($user->avatar != 'user.jpg') {
                Storage::delete('avatars/' . $user->avatar);
            }

            Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatars/' . $filename ) );
            $user->avatar = $filename;
            $user->save();
        }

        return redirect('/profile')->with('success', 'Nuotrauka pakeista!');

    }
}

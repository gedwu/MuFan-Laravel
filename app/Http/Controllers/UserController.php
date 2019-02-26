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
        if(!$request->hasFile('avatar')){
            return redirect('/profile')->with('error', 'Neįkėlete jokios nuotraukos');
        }

        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();

        $user = Auth::user();

        if ($user->avatar != 'user.jpg') {
            if (!Storage::delete('avatars/' . $user->avatar)) {
                return redirect('/profile')->with('error', 'Nepavyko ištrinti senojo nuotraukos failo');
            }
        }

        if (!Image::make($avatar)->resize(300, 300)->save( public_path('/storage/avatars/' . $filename ) )) {
            return redirect('/profile')->with('error', 'Nepavyko įkelti nuotraukos failo');
        }

        $user->avatar = $filename;

        if (!$user->save()) {
            return redirect('/profile')->with('error', 'Nepavyko atnaujinti duomenų bazės');
        }

        return redirect('/profile')->with('success', 'Nuotrauka pakeista!');
    }
}

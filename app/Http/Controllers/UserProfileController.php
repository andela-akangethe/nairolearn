<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function getProfile($id)
    {
        return view('dashboard.profile');
    }
    public function getEdit()
    {
        return view('dashboard.editprofile');
    }
    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha|max:50',
            'email' => 'required|email',
        ]);
        Auth::user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        return redirect()->route('userProfileEdit');
    }
}

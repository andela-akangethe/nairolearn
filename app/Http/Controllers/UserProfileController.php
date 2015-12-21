<?php

namespace app\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    /**
     * Get the profile by user id.
     *
     * @return profile view
     */
    public function getProfile($id)
    {
        return view('dashboard.profile');
    }

    /**
     * Get Edit profile method.
     *
     * @return edit view
     */
    public function getEdit()
    {
        return view('dashboard.editprofile');
    }

    /**
     * Change the user profile info.
     *
     * @return edit view
     */
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

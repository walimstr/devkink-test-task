<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileIndex() {
        return view('profile.profile');
    }
    public function profileUpdate(UserRequest $request) {
        $check = User::updateUserProfile($request->all());
        if($check['status']) {
            return back()->with('success',$check['message']);
        } else {
            return back()->with('error',$check['message']);
        }
    }
}

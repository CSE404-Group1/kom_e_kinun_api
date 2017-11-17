<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\User;

class RegisterController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->description = $request->description;
        $user->phone_num = $request->phone_num;
        $user->facebook_page = $request->facebook_page;
        $user->location = $request->location;
        $user->website = $request->website;
        $user->is_superadmin = $request->is_superadmin;
        $user->is_seller = $request->is_seller;
        $user->is_premium = $request->is_premium;

        $user->save();

        return $user;
    }
}

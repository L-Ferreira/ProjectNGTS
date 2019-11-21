<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource as UserResource;
use Illuminate\Http\Request;
use App\User;

class UserControllerAPI extends Controller
{
    public function myProfile(Request $request)
    {
        return new UserResource($request->user());
    }

    public function blockByEmail(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $user->blocked = 1;
        $user->delete();
        $user->save();
        
        return response()->json([$user, 200]);
    }

    public function getUserBlock(Request $request)
    {
        return User::where('email', $request->email)->firstOrFail()->blocked;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource as UserResource;

class UserControllerAPI extends Controller
{
    public function myProfile(Request $request)
    {
        return new UserResource($request->user());
    }
}

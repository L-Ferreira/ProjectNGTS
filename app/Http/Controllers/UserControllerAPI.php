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

        $user->ban([
            'comment' => 'O utilizador excedeu as 3 tentativas de login!',
            'expired_at' => '+15 seconds',
        ]);
        
        return response()->json([$user, 200]);
    }

    public function getUserBlock(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        if($user) {
            return response()->json([
                'isBanned' => $user->isBanned()
            ]);
        }

        return response()->json([
            'message' => 'User com o email '. $request->email.' não encontrado'
        ], 404);         
    }
}

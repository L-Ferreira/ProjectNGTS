<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Helpers extends Controller
{
    public function generateLog(Request $request)
    {
        Log::channel('papertrail')->alert($request->message);
    }
}

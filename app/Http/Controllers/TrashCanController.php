<?php

namespace App\Http\Controllers;

use App\TrashCan;
use Illuminate\Http\Request;

class TrashCanController extends Controller
{
    public function register(Request $request)
    {
        $trashcan = TrashCan::findOrFail(1);
        $trashcan->humidity = $request->humidity;
        $trashcan->temperature = $request->temperature;
        $trashcan->save();

        return $trashcan;
    }

    public function getTrashCan($id)
    {
        return TrashCan::findOrFail($id);
    }
}

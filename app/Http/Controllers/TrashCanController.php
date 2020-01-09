<?php

namespace App\Http\Controllers;

use App\TrashCan;
use Illuminate\Http\Request;

class TrashCanController extends Controller
{
    public function register(Request $request)
    {
        $trashcan = new TrashCan;
        $trashcan->humidity = $request->humidity;
        $trashcan->temperature = $request->temperature;
        $trashcan->capacity = $request->capacity;
        $trashcan->save();

        return $trashcan;
    }

    public function getTrashCan($id)
    {
        return TrashCan::findOrFail($id);
    }
}

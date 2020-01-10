<?php

namespace App\Http\Controllers;

use App\Statistic;
use App\TrashCan;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = array();
        // $index = 0;
        // $allStats = Statistic::get();
        // for ($i=0; $i < $allStats->count(); $i++) {
        //     $temperature = 0;
        //     $humidity = 0;
        //     $capacity = 0;
        //     $index  = 0;

        //     for ($j=0; $j < $allStats->count(); $j++) {
        //         $interval = $allStats[$i]->created_at->diff($allStats[$j]->created_at);
        //         if ($interval->i <= 60 && $allStats[$i]->created_at->hour == $allStats[$j]->created_at->hour && $allStats[$i]->created_at->day == $allStats[$j]->created_at->day && $allStats[$i]->created_at->month == $allStats[$j]->created_at->month) {
        //             $temperature += $allStats[$j]->temperature;
        //             $humidity += $allStats[$j]->humidity;
        //             $capacity += $allStats[$j]->capacity;
        //             $index++;
        //         }
        //     }
        //     array_push($data, array(($temperature/$index),($humidity/$index),($capacity/$index),$allStats[$i]->created_at));

        // }
        // dd($data);
        return Statistic::orderBy('created_at','desc')->take(15)->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_trash_can = TrashCan::latest()->first();
        $last_statistic = Statistic::latest()->first();
        $data = TrashCan::where('created_at', '>', $last_statistic->created_at)->get();
        // TODO
        // Se a data da ultimo trash_can for maior que a da ultima estatistica ent ok, else nada,
        // se for maior então percorrer ate encontrar uma que seja menor que a ultima estatistica, e só ai inserir.
        // Alias juntar todos e fazer media e depois inserir.
        if ($last_trash_can->created_at >= $last_statistic->created_at) {
            foreach ($data as $value) {
                if ($value->created_at > $last_statistic->created_at) {
                    $statistic = new Statistic;
                    $statistic->trash_can = 1;
                    $statistic->humidity = $value->humidity;
                    $statistic->temperature = $value->temperature;
                    $statistic->capacity = $value->capacity;
                    $statistic->created_at = $value->created_at;
                    $statistic->save();
                }
            }
        }

        return $data;
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistic $statistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

class UserScheduleController extends Controller
{
    public function index()
    {
        $dataSchedule = Schedule::orderBy('region')
            ->get()
            ->groupBy('region');

        return view('home.praktikum.jadwal', compact('dataSchedule'));
    }
}

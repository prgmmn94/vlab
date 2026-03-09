<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

class UserScheduleController extends Controller
{
public function index()
    {
        $jadwalData = Schedule::orderBy('region')
            ->get()
            ->groupBy('region');

        return view('home.praktikum.jadwal', compact('jadwalData'));
    }
}
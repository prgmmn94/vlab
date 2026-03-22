<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentPeriod;

class CandidateAnnouncementController extends Controller
{
    public function index()
    {
        $periods = RecruitmentPeriod::with([
            'announcements' => fn($q) => $q->published(),
        ])
            ->orderBy('tahun', 'desc')
            ->get()
            ->filter(fn($p) => $p->announcements->isNotEmpty());

        return view('home.candidate_announcements.index', compact('periods'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;
use App\Models\RecruitmentPeriod;
use Illuminate\View\View;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RecruitmentPeriod $recruitmentPeriod, Request $request)
    {
        $query = Recruitment::where('recruitment_period_id', $recruitmentPeriod->id);

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                    ->orWhere('npm', 'like', "%{$search}%")
                    ->orWhere('jurusan', 'like', "%{$search}%")
                    ->orWhere('id_calas', 'like', "%{$search}%");
            });
        }

        $recruitments = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Statistik umum
        $stats = [
            'programmer' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                ->where('posisi_dilamar', 'programmer')
                ->count(),
            'asisten' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                ->where('posisi_dilamar', 'asisten')
                ->count(),
            'with_berkas' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                ->whereNotNull('berkas')
                ->count(),
        ];

        // Statistik per region
        $regions = ['Depok', 'Kalimalang', 'Salemba', 'Karawaci', 'Cengkareng'];
        $regionStats = [];

        foreach ($regions as $region) {
            $regionStats[$region] = [
                'programmer' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                    ->where('region', $region)
                    ->where('posisi_dilamar', 'programmer')
                    ->count(),
                'asisten' => Recruitment::where('recruitment_period_id', $recruitmentPeriod->id)
                    ->where('region', $region)
                    ->where('posisi_dilamar', 'asisten')
                    ->count(),
            ];
        }

        return view('admin.recruitments.index', compact('recruitmentPeriod', 'recruitments', 'stats', 'regionStats'));
    }

    /**
     * Show thekspor form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

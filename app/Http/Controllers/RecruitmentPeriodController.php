<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentPeriod;
use Illuminate\Http\Request;

class RecruitmentPeriodController extends Controller
{
    public function index(Request $request)
    {
        $query = RecruitmentPeriod::query();

        // Filter by tahun
        if ($request->filled('filter_tahun')) {
            $query->where('tahun', $request->filter_tahun);
        }

        // Order by latest
        $query->orderBy('tahun', 'desc');

        $periods = $query->paginate(3)->withQueryString();

        // Get available years for filter dropdown
        $years = RecruitmentPeriod::distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('admin.recruitment_periods.index', compact('periods', 'years'));
    }

    public function create()
    {
        return view('admin.recruitment_periods.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer|min:2000|max:2100',
        ], [
            'tahun.required' => 'Tahun wajib diisi',
            'tahun.integer' => 'Tahun harus berupa angka',
            'tahun.min' => 'Tahun minimal 2000',
            'tahun.max' => 'Tahun maksimal 2100',
        ]);

        // Cek duplikasi tahun
        $exists = RecruitmentPeriod::where('tahun', $validated['tahun'])->exists();

        if ($exists) {
            return back()
                ->withErrors(['tahun' => 'Periode untuk tahun ini sudah ada!'])
                ->withInput();
        }

        // Simpan data
        RecruitmentPeriod::create([
            'tahun' => $validated['tahun'],
        ]);

        return redirect()->route('recruitment_periods.index')
            ->with('success', 'Periode berhasil ditambahkan!');
    }

    public function edit(RecruitmentPeriod $recruitmentPeriod)
    {
        return view('admin.recruitment_periods.edit', compact('recruitmentPeriod'));
    }

    public function update(Request $request, RecruitmentPeriod $recruitmentPeriod)
    {
        $validated = $request->validate([
            'tahun' => 'required|integer|min:2000|max:2100',
        ]);

        // Cek duplikasi kecuali data sendiri
        $exists = RecruitmentPeriod::where('tahun', $validated['tahun'])
            ->where('id', '!=', $recruitmentPeriod->id)
            ->exists();

        if ($exists) {
            return back()
                ->withErrors(['tahun' => 'Periode untuk tahun ini sudah ada!'])
                ->withInput();
        }

        $recruitmentPeriod->update([
            'tahun' => $validated['tahun'],
        ]);

        return redirect()->route('recruitment_periods.index')
            ->with('success', 'Periode berhasil diperbarui!');
    }

    public function destroy(RecruitmentPeriod $recruitmentPeriod)
    {
        $recruitmentPeriod->delete();

        return redirect()->route('recruitment_periods.index')
            ->with('success', 'Periode berhasil dihapus!');
    }
}

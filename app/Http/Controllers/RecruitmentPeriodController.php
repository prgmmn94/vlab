<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecruitmentPeriodController extends Controller
{
    public function index(Request $request)
    {
        $query = RecruitmentPeriod::withCount('recruitments');

        // Filter by tahun
        if ($request->filled('filter_tahun')) {
            $query->where('tahun', $request->filter_tahun);
        }

        // Order by latest
        $query->orderBy('tahun', 'desc');

        $periods = $query->paginate(10)->withQueryString();

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
            'is_active' => 'nullable|boolean',
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

        // Jika dicentang aktif, non-aktifkan semua periode lain
        if ($request->has('is_active') && $request->is_active) {
            RecruitmentPeriod::query()->update(['is_active' => false]);
            $validated['is_active'] = true;
        } else {
            $validated['is_active'] = false;
        }

        // Simpan data
        RecruitmentPeriod::create($validated);

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
            'is_active' => 'nullable|boolean',
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

        // Jika dicentang aktif, non-aktifkan semua periode lain
        if ($request->has('is_active') && $request->is_active) {
            RecruitmentPeriod::where('id', '!=', $recruitmentPeriod->id)
                ->update(['is_active' => false]);
            $validated['is_active'] = true;
        } else {
            $validated['is_active'] = false;
        }

        $recruitmentPeriod->update($validated);

        return redirect()->route('recruitment_periods.index')
            ->with('success', 'Periode berhasil diperbarui!');
    }

    public function destroy(RecruitmentPeriod $recruitmentPeriod)
    {
        // Hapus semua file berkas di folder periode ini
        $folderPath = 'recruitments/' . $recruitmentPeriod->tahun;
        if (Storage::disk('public')->exists($folderPath)) {
            Storage::disk('public')->deleteDirectory($folderPath);
        }

        $recruitmentPeriod->delete();

        return redirect()->route('recruitment_periods.index')
            ->with('success', 'Periode berhasil dihapus beserta semua file!');
    }

    /**
     * Toggle status aktif periode
     */
    public function toggleActive(RecruitmentPeriod $recruitmentPeriod)
    {
        if (!$recruitmentPeriod->is_active) {
            // Aktifkan periode ini dan non-aktifkan yang lain
            $recruitmentPeriod->activate();
            $message = 'Periode ' . $recruitmentPeriod->tahun . ' berhasil diaktifkan!';
        } else {
            // Non-aktifkan periode ini
            $recruitmentPeriod->update(['is_active' => false]);
            $message = 'Periode ' . $recruitmentPeriod->tahun . ' berhasil dinonaktifkan!';
        }

        return redirect()->back()->with('success', $message);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Schedule::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('region', 'like', "%{$search}%");
            });
        }

        $schedules = $query->latest('created_at')->paginate(10)->withQueryString();

        return view('admin.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'region' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'lesson' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'region.required' => 'Region wajib diisi',
            'class.required' => 'Kelas wajib diisi',
            'lesson.required' => 'Mata Praktikum wajib diisi',
            'image.required' => 'Gambar jadwal wajib diupload',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 5MB',
        ]);

        // Upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($request->region) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('schedules', $namaImage, 'public');
            $validated['image'] = $path;
        }

        Schedule::create($validated);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        return view('admin.schedules.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'region' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'lesson' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'region.required' => 'Region wajib diisi',
            'class.required' => 'Kelas wajib diisi',
            'lesson.required' => 'Mata Praktikum wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 5MB',
        ]);

        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($schedule->image && Storage::disk('public')->exists($schedule->image)) {
                Storage::disk('public')->delete($schedule->image);
            }

            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($request->region) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('schedules', $namaImage, 'public');
            $validated['image'] = $path;
        }

        $schedule->update($validated);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        // Hapus gambar dari storage
        if ($schedule->image && Storage::disk('public')->exists($schedule->image)) {
            Storage::disk('public')->delete($schedule->image);
        }

        $schedule->delete();

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }

    /**
     * Bulk delete schedules
     */
    public function bulkDestroy(Request $request)
    {
        // Validasi input
        $request->validate([
            'schedule_ids' => 'required|array',
            'schedule_ids.*' => 'exists:schedules,id'
        ]);

        try {
            // Ambil semua schedules yang akan dihapus
            $schedulesToDelete = Schedule::whereIn('id', $request->schedule_ids)->get();

            // Hapus gambar dari storage
            foreach ($schedulesToDelete as $schedule) {
                if ($schedule->image && Storage::disk('public')->exists($schedule->image)) {
                    Storage::disk('public')->delete($schedule->image);
                }
            }

            // Hapus data dari database
            $deletedCount = Schedule::whereIn('id', $request->schedule_ids)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.schedules.index')->with([
                'success' => "Berhasil menghapus {$deletedCount} jadwal!"
            ]);
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->route('admin.schedules.index')->with([
                'error' => 'Gagal menghapus data: ' . $e->getMessage()
            ]);
        }
    }
}

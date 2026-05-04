<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SchedulesController extends Controller
{
    // Path tujuan copy file di public_html
    protected $publicStoragePath = '/home/vlab/public_html/storage/';

    /**
     * Copy gambar ke public_html/storage
     */
    private function copyToPublic($path)
    {
        $destination = $this->publicStoragePath . $path;
        $dir = dirname($destination);

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        copy(storage_path('app/public/' . $path), $destination);
    }

    /**
     * Hapus gambar dari public_html/storage
     */
    private function deleteFromPublic($path)
    {
        $file = $this->publicStoragePath . $path;
        if (file_exists($file)) {
            unlink($file);
        }
    }

    public function index(Request $request)
    {
        $query = Schedule::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('region', 'like', "%{$search}%");
            });
        }

        $schedules = $query->latest('created_at')->paginate(10)->withQueryString();

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedules.create');
    }

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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($request->region) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('schedules', $namaImage, 'public');
            $validated['image'] = $path;

            // Copy ke public_html
            $this->copyToPublic($path);
        }

        Schedule::create($validated);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function show(Schedule $schedule)
    {
        return view('admin.schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', compact('schedule'));
    }

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

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($schedule->image) {
                Storage::disk('public')->delete($schedule->image);
                $this->deleteFromPublic($schedule->image);
            }

            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($request->region) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('schedules', $namaImage, 'public');
            $validated['image'] = $path;

            // Copy ke public_html
            $this->copyToPublic($path);
        }

        $schedule->update($validated);

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil diupdate.');
    }

    public function destroy(Schedule $schedule)
    {
        if ($schedule->image) {
            Storage::disk('public')->delete($schedule->image);
            $this->deleteFromPublic($schedule->image);
        }

        $schedule->delete();

        return redirect()->route('admin.schedules.index')
            ->with('success', 'Jadwal berhasil dihapus.');
    }

    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'schedule_ids' => 'required|array',
            'schedule_ids.*' => 'exists:schedules,id'
        ]);

        try {
            $schedulesToDelete = Schedule::whereIn('id', $request->schedule_ids)->get();

            foreach ($schedulesToDelete as $schedule) {
                if ($schedule->image) {
                    Storage::disk('public')->delete($schedule->image);
                    $this->deleteFromPublic($schedule->image);
                }
            }

            $deletedCount = Schedule::whereIn('id', $request->schedule_ids)->delete();

            return redirect()->route('admin.schedules.index')->with([
                'success' => "Berhasil menghapus {$deletedCount} jadwal!"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.schedules.index')->with([
                'error' => 'Gagal menghapus data: ' . $e->getMessage()
            ]);
        }
    }
}
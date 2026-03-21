<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use Illuminate\Http\Request;

class PhotoEventController extends Controller
{
    public function index(Request $request)
    {
        $query = PhotoEvent::withCount('photos');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('event_name', 'like', "%{$search}%");
        }

        $photoEvents = $query->latest('event_date')->paginate(10)->withQueryString();

        return view('admin.photo_events.index', compact('photoEvents'));
    }

    public function create()
    {
        return view('admin.photo_events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255|unique:photo_events,event_name',
            'event_date' => 'required|date',
        ], [
            'event_name.required' => 'Nama event wajib diisi',
            'event_name.unique' => 'Nama event sudah ada',
            'event_date.required' => 'Tanggal event wajib diisi',
            'event_date.date' => 'Format tanggal tidak valid',
        ]);

        PhotoEvent::create($validated);

        return redirect()->route('admin.photo_events.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(PhotoEvent $photoEvent)
    {
        return view('admin.photo_events.edit', compact('photoEvent'));
    }

    public function update(Request $request, PhotoEvent $photoEvent)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255|unique:photo_events,event_name,' . $photoEvent->id,
            'event_date' => 'required|date',
        ], [
            'event_name.required' => 'Nama kegiatan wajib diisi',
            'event_name.unique' => 'Nama kegiatan sudah ada',
            'event_date.required' => 'Tanggal kegiatan wajib diisi', 
            'event_date.date' => 'Format tanggal tidak valid',
        ]);

        $photoEvent->update($validated);

        return redirect()->route('admin.photo_events.index')
            ->with('success', 'Kegiatan berhasil diupdate.');
    }

    public function destroy(PhotoEvent $photoEvent)
    {
        // Cek apakah ada foto
        if ($photoEvent->photos()->count() > 0) {
            return redirect()->route('admin.photo_events.index')
                ->with('error', 'Kegiatan tidak dapat dihapus karena masih memiliki ' . $photoEvent->photos()->count() . ' foto!');
        }

        $photoEvent->delete();

        return redirect()->route('admin.photo_events.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }

    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'photo_event_ids' => 'required|array',
            'photo_event_ids.*' => 'exists:photo_events,id'
        ]);

        try {
            // Cek apakah ada yang memiliki foto
            $hasPhotos = PhotoEvent::whereIn('id', $request->photo_event_ids)
                ->has('photos')
                ->exists();

            if ($hasPhotos) {
                return redirect()->route('admin.photo_events.index')->with([
                    'error' => 'Beberapa kegiatan tidak dapat dihapus karena masih memiliki foto!'
                ]);
            }

            $deletedCount = PhotoEvent::whereIn('id', $request->photo_event_ids)->delete();

            return redirect()->route('admin.photo_events.index')->with([
                'success' => "Berhasil menghapus {$deletedCount} kegiatan!"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.photo_events.index')->with([
                'error' => 'Gagal menghapus data: ' . $e->getMessage()
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    public function index(PhotoEvent $photoEvent, Request $request)
    {
        $query = $photoEvent->photos();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('caption', 'like', "%{$search}%");
        }

        $photos = $query->latest('created_at')->paginate(12)->withQueryString();

        return view('admin.photos.index', compact('photoEvent', 'photos'));
    }

    public function create(PhotoEvent $photoEvent)
    {
        return view('admin.photos.create', compact('photoEvent'));
    }

    public function store(Request $request, PhotoEvent $photoEvent)
    {
        $validated = $request->validate([
            'caption' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'image.required' => 'Gambar wajib diupload',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 5MB',
        ]);

        // Upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($photoEvent->event_name) . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('photos/' . $photoEvent->id, $namaImage, 'public');
            $validated['image'] = $path;
        }

        $validated['photo_event_id'] = $photoEvent->id;

        Photo::create($validated);

        return redirect()->route('admin.photo_events.photos.index', $photoEvent->id)
            ->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(PhotoEvent $photoEvent, Photo $photo)
    {
        return view('admin.photos.edit', compact('photoEvent', 'photo'));
    }

    public function update(Request $request, PhotoEvent $photoEvent, Photo $photo)
    {
        $validated = $request->validate([
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 5MB',
        ]);

        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($photo->image && Storage::disk('public')->exists($photo->image)) {
                Storage::disk('public')->delete($photo->image);
            }

            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($photoEvent->event_name) . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('photos/' . $photoEvent->id, $namaImage, 'public');
            $validated['image'] = $path;
        }

        $photo->update($validated);

        return redirect()->route('admin.photo_events.photos.index', $photoEvent->id)
            ->with('success', 'Foto berhasil diupdate.');
    }

    public function destroy(PhotoEvent $photoEvent, Photo $photo)
    {
        // Hapus gambar dari storage
        if ($photo->image && Storage::disk('public')->exists($photo->image)) {
            Storage::disk('public')->delete($photo->image);
        }

        $photo->delete();

        return redirect()->route('admin.photo_events.photos.index', $photoEvent->id)
            ->with('success', 'Foto berhasil dihapus.');
    }

    public function bulkDestroy(Request $request, PhotoEvent $photoEvent)
    {
        $request->validate([
            'photo_ids' => 'required|array',
            'photo_ids.*' => 'exists:photos,id'
        ]);

        try {
            $photosToDelete = Photo::whereIn('id', $request->photo_ids)
                ->where('photo_event_id', $photoEvent->id)
                ->get();

            foreach ($photosToDelete as $photo) {
                if ($photo->image && Storage::disk('public')->exists($photo->image)) {
                    Storage::disk('public')->delete($photo->image);
                }
            }

            $deletedCount = Photo::whereIn('id', $request->photo_ids)
                ->where('photo_event_id', $photoEvent->id)
                ->delete();

            return redirect()->route('admin.photo_events.photos.index', $photoEvent->id)->with([
                'success' => "Berhasil menghapus {$deletedCount} foto!"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.photo_events.photos.index', $photoEvent->id)->with([
                'error' => 'Gagal menghapus data: ' . $e->getMessage()
            ]);
        }
    }
}

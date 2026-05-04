<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    protected $publicStoragePath = '/home/vlab/public_html/storage/';

    private function copyToPublic($path)
    {
        $destination = $this->publicStoragePath . $path;
        $dir = dirname($destination);

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        copy(storage_path('app/public/' . $path), $destination);
    }

    private function deleteFromPublic($path)
    {
        $file = $this->publicStoragePath . $path;
        if (file_exists($file)) {
            unlink($file);
        }
    }

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

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($photoEvent->event_name) . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('photos/' . $photoEvent->id, $namaImage, 'public');
            $validated['image'] = $path;

            // Copy ke public_html
            $this->copyToPublic($path);
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

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($photo->image) {
                Storage::disk('public')->delete($photo->image);
                $this->deleteFromPublic($photo->image);
            }

            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($photoEvent->event_name) . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('photos/' . $photoEvent->id, $namaImage, 'public');
            $validated['image'] = $path;

            // Copy ke public_html
            $this->copyToPublic($path);
        }

        $photo->update($validated);

        return redirect()->route('admin.photo_events.photos.index', $photoEvent->id)
            ->with('success', 'Foto berhasil diupdate.');
    }

    public function destroy(PhotoEvent $photoEvent, Photo $photo)
    {
        if ($photo->image) {
            Storage::disk('public')->delete($photo->image);
            $this->deleteFromPublic($photo->image);
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
                if ($photo->image) {
                    Storage::disk('public')->delete($photo->image);
                    $this->deleteFromPublic($photo->image);
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
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PhotoEvent;

class UserPhotoController extends Controller
{
    public function index(Request $request)
    {
        $photoEvents = PhotoEvent::withCount('photos')
            ->with(['photos' => fn($q) => $q->latest()->limit(1)])
            ->latest('event_date')
            ->take(4)
            ->get();

        return view('home.galeri.index', compact('photoEvents'));
    }

    public function kategori(Request $request)
    {
        $photoEvents = PhotoEvent::withCount('photos')
            ->with(['photos' => fn($q) => $q->latest()->limit(1)])
            ->latest('event_date')
            ->paginate(4);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('home.galeri._card', compact('photoEvents'))->render(),
                'hasMore' => $photoEvents->hasMorePages(),
                'currentPage' => $photoEvents->currentPage(),
                'lastPage' => $photoEvents->lastPage(),
            ]);
        }

        return view('home.galeri.kategori', compact('photoEvents'));
    }

    public function show(string $slug)
    {
        $photoEvent = PhotoEvent::where('slug', $slug)
            ->withCount('photos')
            ->firstOrFail();

        $photos = $photoEvent->photos()->latest()->paginate(20);

        return view('home.galeri.show', compact('photoEvent', 'photos'));
    }
}

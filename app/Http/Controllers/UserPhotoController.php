<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use Illuminate\Http\Request;

class UserPhotoController extends Controller
{
    public function index()
    {
        $photoEvents = PhotoEvent::withCount('photos')
            ->latest()
            ->paginate(12);

        return view('home.galeri.index', compact('photoEvents'));
    }

    /**
     * Guest route pakai slug
     */
    public function show(string $slug)
    {
        $photoEvent = PhotoEvent::where('slug', $slug)
            ->withCount('photos')
            ->firstOrFail();

        $photos = $photoEvent->photos()->latest()->paginate(20);

        return view('home.galeri.show', compact('photoEvent', 'photos'));
    }
}

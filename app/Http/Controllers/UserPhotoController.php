<?php

namespace App\Http\Controllers;

use App\Models\PhotoEvent;
use App\Models\Photo;
use Illuminate\Http\Request;

class UserPhotoController extends Controller
{
    public function index()
    {
        $categories = PhotoEvent::withCount('photos')
            ->latest()
            ->get();

        return view('home.galeri.index', compact('categories'));
    }

    public function show(Request $request, PhotoEvent $photoEvent)
    {
        $query = $photoEvent->photos();

        if ($request->filled('search')) {
            $query->where('caption', 'like', '%' . $request->search . '%');
        }

        $photos = $query->latest()->paginate(12)->withQueryString();

        return view('home.galeri.show', compact('photoEvent', 'photos'));
    }
}

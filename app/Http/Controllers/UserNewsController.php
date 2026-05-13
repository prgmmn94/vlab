<?php

namespace App\Http\Controllers;

use App\Models\News;

class UserNewsController extends Controller
{
    public function index()
    {
        $dataNews = News::all();

        return view('home.berita.index', [
            'dataNews' => $dataNews
        ]);
    }

    public function detail($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        $otherNews = News::where('slug', '!=', $slug)
            ->latest()
            ->take(2)
            ->get();

        return view('home.berita.detail', compact('news', 'otherNews'));
    }
}

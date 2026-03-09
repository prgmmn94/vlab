<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('isi', 'like', "%{$search}%");
            });
        }

        $news = $query->latest('tanggal')->paginate(10)->withQueryString();

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $today = Carbon::now()->format('Y-m-d');
        return view('admin.news.create', compact('today'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'tanggal' => 'nullable|date',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if (empty($validated['tanggal'])) {
            $validated['tanggal'] = Carbon::now()->format('Y-m-d');
        }

        $validated['slug'] = Str::slug($validated['judul']);

        $validated['excerpt'] = Str::limit(strip_tags($validated['isi']), 150);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');

            $namaImage = time().'_'.Str::slug($request->judul).'.'.$image->getClientOriginalExtension();

            $path = $image->storeAs('news', $namaImage, 'public');

            $validated['gambar'] = $path;
        }

        Berita::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Berita $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(Berita $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, Berita $news)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'tanggal' => 'nullable|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if (empty($validated['tanggal'])) {
            $validated['tanggal'] = $news->tanggal;
        }

        $validated['slug'] = Str::slug($validated['judul']);

        $validated['excerpt'] = Str::limit(strip_tags($validated['isi']), 150);

        if ($request->hasFile('gambar')) {

            if ($news->gambar && Storage::disk('public')->exists($news->gambar)) {
                Storage::disk('public')->delete($news->gambar);
            }

            $image = $request->file('gambar');

            $namaImage = time().'_'.Str::slug($request->judul).'.'.$image->getClientOriginalExtension();

            $path = $image->storeAs('news', $namaImage, 'public');

            $validated['gambar'] = $path;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy(Berita $news)
    {
        if ($news->gambar && Storage::disk('public')->exists($news->gambar)) {
            Storage::disk('public')->delete($news->gambar);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
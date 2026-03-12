<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $news = $query->latest('date_news')->paginate(10)->withQueryString();

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
            'title' => 'required|string|max:255',
            'content' => 'required',
            'date_news' => 'nullable|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'title.required' => 'Judul berita wajib diisi',
            'content.required' => 'Konten berita wajib diisi',
            'image.required' => 'Gambar wajib diupload',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 5MB',
        ]);

        // Auto-fill tanggal jika kosong
        if (empty($validated['date_news'])) {
            $validated['date_news'] = Carbon::now()->format('Y-m-d');
        }

        $validated['slug'] = Str::slug($validated['title']);

        $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('news', $namaImage, 'public');
            $validated['image'] = $path;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'date_news' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ], [
            'title.required' => 'Judul berita wajib diisi',
            'content.required' => 'Konten berita wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 5MB',
        ]);

        if (empty($validated['date_news'])) {
            $validated['date_news'] = $news->date_news;
        }

        $validated['slug'] = Str::slug($validated['title']);

        $validated['excerpt'] = Str::limit(strip_tags($validated['content']), 150);

        if ($request->hasFile('image')) {
            if ($news->image && Storage::disk('public')->exists($news->image)) {
                Storage::disk('public')->delete($news->image);
            }

            $image = $request->file('image');
            $namaImage = time() . '_' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('news', $namaImage, 'public');
            $validated['image'] = $path;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diupdate.');
    }

    public function destroy(News $news)
    {
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'news_ids' => 'required|array',
            'news_ids.*' => 'exists:news,id'
        ]);

        try {
            $newsToDelete = News::whereIn('id', $request->news_ids)->get();

            foreach ($newsToDelete as $news) {
                if ($news->image && Storage::disk('public')->exists($news->image)) {
                    Storage::disk('public')->delete($news->image);
                }
            }

            $deletedCount = News::whereIn('id', $request->news_ids)->delete();

            return redirect()->route('admin.news.index')->with([
                'success' => "Berhasil menghapus {$deletedCount} berita!"
            ]);
        } catch (\Exception $e) {
            return redirect()->route('admin.news.index')->with([
                'error' => 'Gagal menghapus data: ' . $e->getMessage()
            ]);
        }
    }
}
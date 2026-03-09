<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = News::query();

        // Search functionality
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Pass tanggal hari ini untuk default value
        $today = Carbon::now()->format('Y-m-d');
        return view('admin.news.create', compact('today'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

        // Auto-fill tanggal jika tidak diisi
        if (!isset($validated['date_news']) || empty($validated['date_news'])) {
            $validated['date_news'] = Carbon::now()->format('Y-m-d');
        }

        // Upload gambar
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

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
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

        // Gunakan tanggal lama jika tidak diubah
        if (!isset($validated['date_news']) || empty($validated['date_news'])) {
            $validated['date_news'] = $news->date_news;
        }

        // Upload gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        // Hapus gambar dari storage
        if ($news->image && Storage::disk('public')->exists($news->image)) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    /**
     * Bulk delete news
     */
    public function bulkDestroy(Request $request)
    {
        // Validasi input
        $request->validate([
            'news_ids' => 'required|array',
            'news_ids.*' => 'exists:news,id'
        ]);

        try {
            // Ambil semua news yang akan dihapus
            $newsToDelete = News::whereIn('id', $request->news_ids)->get();

            // Hapus gambar dari storage
            foreach ($newsToDelete as $news) {
                if ($news->image && Storage::disk('public')->exists($news->image)) {
                    Storage::disk('public')->delete($news->image);
                }
            }

            // Hapus data dari database
            $deletedCount = News::whereIn('id', $request->news_ids)->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.news.index')->with([
                'success' => "Berhasil menghapus {$deletedCount} berita!"
            ]);
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->route('admin.news.index')->with([
                'error' => 'Gagal menghapus data: ' . $e->getMessage()
            ]);
        }
    }
}

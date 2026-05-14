<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExperienceController extends Controller
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

    public function index(Request $request)
    {
        $query = Experience::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $experiences = $query->latest()->paginate(10)->withQueryString();

        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'required|file|extensions:jpeg,png,jpg,gif|max:5120',
        ], [
            'name.required'        => 'Nama wajib diisi',
            'description.required' => 'Deskripsi pengalaman wajib diisi',
            'image.required'       => 'Gambar wajib diupload',
            'image.extensions'     => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max'            => 'Ukuran gambar maksimal 5MB',
        ]);

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $namaImage = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();

            // Gunakan move() langsung, tidak pakai storeAs (tidak butuh fileinfo)
            $destinasi = storage_path('app/public/experiences');
            if (!file_exists($destinasi)) {
                mkdir($destinasi, 0775, true);
            }
            $image->move($destinasi, $namaImage);

            $validated['image'] = 'experiences/' . $namaImage;
            $this->copyToPublic($validated['image']);
        }

        Experience::create($validated);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience berhasil ditambahkan.');
    }

    public function show(Experience $experience)
    {
        return view('admin.experiences.show', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|file|extensions:jpeg,png,jpg,gif|max:5120',
        ], [
            'name.required'        => 'Nama experience wajib diisi',
            'description.required' => 'Deskripsi experience wajib diisi',
            'image.extensions'     => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max'            => 'Ukuran gambar maksimal 5MB',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($experience->image) {
                $oldPath = storage_path('app/public/' . $experience->image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
                $this->deleteFromPublic($experience->image);
            }

            $image     = $request->file('image');
            $namaImage = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();

            // Gunakan move() langsung, tidak pakai storeAs (tidak butuh fileinfo)
            $destinasi = storage_path('app/public/experiences');
            if (!file_exists($destinasi)) {
                mkdir($destinasi, 0775, true);
            }
            $image->move($destinasi, $namaImage);

            $validated['image'] = 'experiences/' . $namaImage;
            $this->copyToPublic($validated['image']);
        }

        $experience->update($validated);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience berhasil diupdate.');
    }

    public function destroy(Experience $experience)
    {
        if ($experience->image) {
            $oldPath = storage_path('app/public/' . $experience->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            $this->deleteFromPublic($experience->image);
        }

        $experience->delete();

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience berhasil dihapus.');
    }

    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'experience_ids'   => 'required|array',
            'experience_ids.*' => 'exists:experiences,id',
        ]);

        try {
            $toDelete = Experience::whereIn('id', $request->experience_ids)->get();

            foreach ($toDelete as $experience) {
                if ($experience->image) {
                    $oldPath = storage_path('app/public/' . $experience->image);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                    $this->deleteFromPublic($experience->image);
                }
            }

            $deletedCount = Experience::whereIn('id', $request->experience_ids)->delete();

            return redirect()->route('admin.experiences.index')
                ->with('success', "Berhasil menghapus {$deletedCount} experience!");
        } catch (\Exception $e) {
            return redirect()->route('admin.experiences.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }
}
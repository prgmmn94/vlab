<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\RecruitmentPeriod;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Daftar pengumuman milik satu periode.
     */
    public function index(RecruitmentPeriod $recruitmentPeriod)
    {
        $announcements = $recruitmentPeriod->announcements()->ordered()->get();

        return view('admin.recruitment_announcements.index', compact('recruitmentPeriod', 'announcements'));
    }

    /**
     * Form tambah pengumuman.
     */
    public function create(RecruitmentPeriod $recruitmentPeriod)
    {
        return view('admin.recruitment_announcements.create', compact('recruitmentPeriod'));
    }

    /**
     * Simpan pengumuman baru.
     */
    public function store(Request $request, RecruitmentPeriod $recruitmentPeriod)
    {
        $validated = $request->validate([
            'nama_tahap'        => 'required|string|max:255',
            'link_google_sheets' => 'nullable|url|max:2048',
            'deskripsi'         => 'nullable|string|max:5000',
            'is_published'      => 'nullable|boolean',
        ], [
            'nama_tahap.required'        => 'Nama tahap wajib diisi.',
            'link_google_sheets.url'     => 'Link harus berupa URL yang valid.',
        ]);

        $validated['recruitment_period_id'] = $recruitmentPeriod->id;
        $validated['urutan']                = Announcement::nextOrder($recruitmentPeriod->id);
        $validated['is_published']          = $request->boolean('is_published');

        Announcement::create($validated);

        return redirect()
            ->route('recruitment_periods.announcements.index', $recruitmentPeriod)
            ->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    /**
     * Form edit pengumuman.
     * Shallow route — hanya membawa $announcement, recruitmentPeriod di-load dari relasi.
     */
    public function edit(Announcement $announcement)
    {
        $recruitmentPeriod = $announcement->recruitmentPeriod;

        return view('admin.recruitment_announcements.edit', compact('recruitmentPeriod', 'announcement'));
    }

    /**
     * Update pengumuman.
     * Shallow route — hanya membawa $announcement.
     */
    public function update(Request $request, Announcement $announcement)
    {
        $recruitmentPeriod = $announcement->recruitmentPeriod;

        $validated = $request->validate([
            'nama_tahap'         => 'required|string|max:255',
            'link_google_sheets' => 'nullable|url|max:2048',
            'deskripsi'          => 'nullable|string|max:5000',
            'is_published'       => 'nullable|boolean',
        ], [
            'nama_tahap.required'    => 'Nama tahap wajib diisi.',
            'link_google_sheets.url' => 'Link harus berupa URL yang valid.',
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        $announcement->update($validated);

        return redirect()
            ->route('recruitment_periods.announcements.index', $recruitmentPeriod)
            ->with('success', 'Pengumuman berhasil diperbarui!');
    }

    /**
     * Hapus pengumuman.
     * Shallow route — hanya membawa $announcement.
     */
    public function destroy(Announcement $announcement)
    {
        $recruitmentPeriod = $announcement->recruitmentPeriod;

        $announcement->delete();

        $this->reorder($recruitmentPeriod);

        return redirect()
            ->route('recruitment_periods.announcements.index', $recruitmentPeriod)
            ->with('success', 'Pengumuman berhasil dihapus!');
    }

    /**
     * Toggle publish / unpublish.
     */
    public function togglePublish(RecruitmentPeriod $recruitmentPeriod, Announcement $announcement)
    {
        $this->authorizeAnnouncement($recruitmentPeriod, $announcement);

        $announcement->togglePublish();

        $status  = $announcement->is_published ? 'dipublikasikan' : 'disembunyikan';
        $message = "Pengumuman \"{$announcement->nama_tahap}\" berhasil {$status}!";

        return redirect()->back()->with('success', $message);
    }

    /**
     * Update urutan via drag-and-drop / AJAX.
     * Payload JSON: { "order": [id1, id2, id3, ...] }
     */
    public function reorderAjax(Request $request, RecruitmentPeriod $recruitmentPeriod)
    {
        $request->validate([
            'order'   => 'required|array',
            'order.*' => 'string|uuid|exists:announcements,id',
        ]);

        foreach ($request->order as $position => $id) {
            Announcement::where('id', $id)
                ->where('recruitment_period_id', $recruitmentPeriod->id)
                ->update(['urutan' => $position + 1]);
        }

        return response()->json(['success' => true]);
    }

    /*
    |--------------------------------------------------------------------------
    | Private Helpers
    |--------------------------------------------------------------------------
    */

    /** Pastikan announcement benar-benar milik periode yang dimaksud */
    private function authorizeAnnouncement(RecruitmentPeriod $period, Announcement $announcement): void
    {
        abort_if($announcement->recruitment_period_id !== $period->id, 403);
    }

    /** Rapikan urutan setelah penghapusan */
    private function reorder(RecruitmentPeriod $period): void
    {
        $period->announcements()->ordered()->get()
            ->each(function (Announcement $a, int $i) {
                $a->update(['urutan' => $i + 1]);
            });
    }
}

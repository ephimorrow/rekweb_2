<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use App\Http\Requests\StoreSeminarRequest;
use App\Http\Requests\UpdateSeminarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeminarController extends Controller
{
    /**
     * Display listing of seminars
     */
    public function index()
    {
        $seminars = Seminar::latest()->paginate(10);
        return view('admin.seminars.index', compact('seminars'));
    }

    /**
     * Show form for creating new seminar
     */
    public function create()
    {
        return view('admin.seminars.create');
    }

    /**
     * Store newly created seminar
     */
    public function store(StoreSeminarRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('seminars', 'public');
        }

        Seminar::create($data);

        return redirect()->route('admin.seminars.index')
            ->with('success', 'Seminar berhasil dibuat.');
    }

    /**
     * Display specific seminar
     */
    public function show(Seminar $seminar)
    {
        $seminar->load('registrations.participant');
        return view('admin.seminars.show', compact('seminar'));
    }

    /**
     * Show form for editing seminar
     */
    public function edit(Seminar $seminar)
    {
        return view('admin.seminars.edit', compact('seminar'));
    }

    /**
     * Update seminar
     */
    public function update(UpdateSeminarRequest $request, Seminar $seminar)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            // Delete old photo
            if ($seminar->photo) {
                Storage::disk('public')->delete($seminar->photo);
            }
            $data['photo'] = $request->file('photo')->store('seminars', 'public');
        }

        $seminar->update($data);

        return redirect()->route('admin.seminars.index')
            ->with('success', 'Seminar berhasil diperbarui.');
    }

    /**
     * Delete seminar
     */
    public function destroy(Seminar $seminar)
    {
        try {
            // Delete photo file if exists
            if ($seminar->photo) {
                Storage::disk('public')->delete($seminar->photo);
            }

            $seminar->delete();

            return redirect()->route('admin.seminars.index')
                ->with('success', 'Seminar berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.seminars.index')
                ->with('error', 'Terjadi kesalahan saat menghapus seminar.');
        }
    }
}
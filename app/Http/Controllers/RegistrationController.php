<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use App\Models\Participant;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    /**
     * Handle seminar registration
     */
    public function store(Request $request, Seminar $seminar)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20',
            'prodi' => 'nullable|string|max:100',
        ]);

        try {
            DB::transaction(function () use ($validated, $seminar) {
                // Create or find participant
                $participant = Participant::firstOrCreate(
                    ['nim' => $validated['nim'] ?? null],
                    [
                        'name' => $validated['name'],
                        'prodi' => $validated['prodi'],
                    ]
                );

                // Create registration
                Registration::create([
                    'seminar_id' => $seminar->id,
                    'participant_id' => $participant->id,
                    'status' => 'terdaftar',
                ]);
            });

            return redirect()->route('seminars.show', $seminar)
                ->with('success', 'Pendaftaran berhasil!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat mendaftar.')
                ->withInput();
        }
    }
}
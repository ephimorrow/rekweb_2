<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use App\Models\Participant;
use App\Models\Registration;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard with statistics
     */
    public function index()
    {
        $stats = [
            'seminars_count' => Seminar::count(),
            'participants_count' => Participant::count(),
            'registrations_count' => Registration::count(),
            'upcoming_seminars' => Seminar::where('datetime', '>', now())->count(),
        ];

        $recentSeminars = Seminar::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentSeminars'));
    }
}
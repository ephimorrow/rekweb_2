<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    /**
     * Display listing of seminars for public
     */
    public function index()
    {
        $seminars = Seminar::where('datetime', '>', now())
            ->orderBy('datetime')
            ->paginate(9);
            
        return view('seminars.index', compact('seminars'));
    }

    /**
     * Display specific seminar for public
     */
    public function show(Seminar $seminar)
    {
        // Eager load relationships dengan cara yang aman
        $seminar->load(['registrations' => function($query) {
            $query->with('participant');
        }]);
        
        return view('seminars.show', compact('seminar'));
    }
}
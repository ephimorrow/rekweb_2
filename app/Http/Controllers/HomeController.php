<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display home page with featured seminars
     */
    public function index()
    {
        $featuredSeminars = Seminar::where('datetime', '>', now())
            ->orderBy('datetime')
            ->take(3)
            ->get();

        return view('home', compact('featuredSeminars'));
    }

    /**
     * Display about page
     */
    public function about()
    {
        return view('about');
    }
}
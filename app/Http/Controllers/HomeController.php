<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::with(['user', 'participants'])
            ->where('date_heure', '>=', now())
            ->orderBy('date_heure', 'asc')
            ->paginate(12);

        $categories = Event::select('categorie')
            ->distinct()
            ->pluck('categorie');

        return view('welcome', compact('events', 'categories'));
    }

    public function dashboard(){

        return view("dashboard/index");

    }
}

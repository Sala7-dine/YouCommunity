<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(10);
        return view('dashboard/index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'lieu' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'date_heure' => 'required|date',
            'categorie' => 'required|string',
            'max_participants' => 'nullable|integer|min:1',
        ]);

        Event::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'lieu' => $request->lieu,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'date_heure' => $request->date_heure,
            'categorie' => $request->categorie,
            'user_id' => Auth::id(),
            'max_participants' => $request->max_participants,
        ]);

        return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required',
            'lieu' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'date_heure' => 'required|date',
            'categorie' => 'required|string',
            'max_participants' => 'nullable|integer|min:1',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Événement mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé.');
    }
}

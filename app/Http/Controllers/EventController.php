<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer uniquement les événements de l'utilisateur connecté
        $events = Event::where('user_id', Auth::id())
            ->orderBy('date_heure', 'asc')
            ->paginate(10);

        // Compter les statistiques pour l'utilisateur
        $stats = [
            'total' => Event::where('user_id', Auth::id())->count(),
            'upcoming' => Event::where('user_id', Auth::id())
                ->where('date_heure', '>', now())
                ->count(),
            'past' => Event::where('user_id', Auth::id())
                ->where('date_heure', '<', now())
                ->count(),
        ];

        return view('dashboard/index', compact('events', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'titre' => 'required|string|max:255',
                'description' => 'required|string',
                'lieu' => 'required|string',
                'date_heure' => 'required|date',
                'categorie' => 'required|string',
                'max_participants' => 'nullable|integer|min:1',
                'latitude' => 'nullable|numeric',  // Rendu optionnel pour le moment
                'longitude' => 'nullable|numeric', // Rendu optionnel pour le moment
            ]);

            // Ajouter l'ID de l'utilisateur aux données validées
            $validated['user_id'] = Auth::id();

            // Si latitude/longitude ne sont pas fournis, utiliser des valeurs par défaut
            if (!isset($validated['latitude'])) {
                $validated['latitude'] = 0;
            }
            if (!isset($validated['longitude'])) {
                $validated['longitude'] = 0;
            }

            // Créer l'événement
            $event = Event::create($validated);

            Log::info('Événement créé avec succès', ['event' => $event]);

            return redirect()->route('dashboard')
                ->with('success', 'Événement créé avec succès.');

        } catch (\Exception $e) {
            Log::error('Erreur lors de la création de l\'événement', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);

            return redirect()->route('dashboard')
                ->with('error', 'Une erreur est survenue lors de la création de l\'événement.');
        }
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
        // Vérifier si l'utilisateur actuel est le propriétaire de l'événement
        if ($event->user_id !== auth()->id()) {
            return redirect()->route('dashboard')
                ->with('error', 'Vous n\'êtes pas autorisé à supprimer cet événement.');
        }

        $event->delete();
        
        return redirect()->route('dashboard')
            ->with('success', 'L\'événement a été supprimé avec succès.');
    }
}

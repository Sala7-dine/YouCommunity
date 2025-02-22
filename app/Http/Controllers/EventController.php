<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
                'image' => 'nullable|string'
            ]);

            // Gérer l'upload de l'image
            // if ($request->hasFile('image')) {
            //     $image = $request->file('image');
            //     $imageName = time() . '.' . $image->getClientOriginalExtension();
            //     $image->move(public_path('images'), $imageName);
            //     $validated['image'] = 'images/' . $imageName;
            // }

            // Ajouter des valeurs par défaut pour latitude et longitude
            $validated['latitude'] = 0;
            $validated['longitude'] = 0;

            // Créer l'événement
            $event = Event::create([
                ...$validated,
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('dashboard')
                ->with('success', 'Événement créé avec succès.');

        } catch (\Exception $e) {
            Log::error('Event creation failed', [
                'error' => $e->getMessage(),
                'data' => $request->all()
            ]);

            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de la création de l\'événement : ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('Event.detaile', compact('event'));
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
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'lieu' => 'required|string',
            'date_heure' => 'required|date',
            'categorie' => 'required|string',
            'max_participants' => 'nullable|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            // Gérer l'upload de la nouvelle image
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if ($event->image) {
                    Storage::disk('public')->delete($event->image);
                }
                
                $imagePath = $request->file('image')->store('events', 'public');
                $validated['image'] = $imagePath;
            }

            $event->update($validated);

            return redirect()->route('dashboard')
                ->with('success', 'Événement mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de la mise à jour de l\'événement.');
        }
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

    public function discover(Request $request)
    {
        $query = Event::with(['user', 'participants'])
            ->where('date_heure', '>=', now());

        // Recherche
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('lieu', 'like', "%{$search}%");
            });
        }

        // Filtre par catégorie
        if ($request->has('categorie') && $request->categorie !== '') {
            $query->where('categorie', $request->categorie);
        }

        $events = $query->orderBy('date_heure', 'asc')->paginate(12);
        $categories = Event::select('categorie')->distinct()->pluck('categorie');

        return view('Event.discover', compact('events', 'categories'));
    }
}

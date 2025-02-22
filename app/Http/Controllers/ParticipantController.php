<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participations = Participant::with(['event', 'event.user'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy('status');

        return view('dashboard.participant', compact('participations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        //
    }

    public function participate(Event $event, Request $request)
    {
        // Vérifier si l'événement est complet
        if ($event->max_participants && $event->participants()->count() >= $event->max_participants) {
            return response()->json([
                'success' => false,
                'message' => 'L\'événement est complet'
            ]);
        }

        // Créer ou mettre à jour la participation
        $participant = Participant::updateOrCreate(
            [
                'event_id' => $event->id,
                'user_id' => auth()->id(),
            ],
            [
                'status' => $request->status
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Participation mise à jour',
            'status' => $participant->status
        ]);
    }

    public function cancel(Event $event)
    {
        $participant = Participant::where([
            'event_id' => $event->id,
            'user_id' => auth()->id(),
        ])->delete();

        return response()->json([
            'success' => true,
            'message' => 'Participation annulée'
        ]);
    }

    public function updateStatus(Event $event, User $user, Request $request)
    {
        // Vérifier si l'utilisateur connecté est le créateur de l'événement
        if ($event->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Non autorisé'
            ], 403);
        }

        $participant = Participant::where([
            'event_id' => $event->id,
            'user_id' => $user->id
        ])->first();

        if (!$participant) {
            return response()->json([
                'success' => false,
                'message' => 'Participation non trouvée'
            ], 404);
        }

        $participant->update([
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Statut mis à jour avec succès'
        ]);
    }
}

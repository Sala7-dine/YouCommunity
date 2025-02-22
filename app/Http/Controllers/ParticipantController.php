<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
}

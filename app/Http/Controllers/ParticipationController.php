<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParticipationController extends Controller
{
    public function participate(Event $event, Request $request)
    {
        // Vérifier si l'utilisateur n'est pas l'organisateur
        if ($event->user_id === Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Vous ne pouvez pas participer à votre propre événement'
            ], 403);
        }

        // Vérifier si l'événement n'est pas complet
        if ($event->max_participants && $event->participants()->count() >= $event->max_participants) {
            return response()->json([
                'success' => false,
                'message' => 'L\'événement est complet'
            ], 400);
        }

        // Créer ou mettre à jour la participation
        $participation = Participant::updateOrCreate(
            [
                'event_id' => $event->id,
                'user_id' => Auth::id(),
            ],
            ['status' => $request->status]
        );

        return response()->json([
            'success' => true,
            'status' => $participation->status,
            'message' => 'Participation enregistrée avec succès'
        ]);
    }

    public function cancel(Event $event)
    {
        $participation = Participant::where([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
        ])->first();

        if ($participation) {
            $participation->delete();
            return response()->json([
                'success' => true,
                'message' => 'Participation annulée avec succès'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Participation non trouvée'
        ], 404);
    }
} 
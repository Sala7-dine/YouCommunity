<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'image',
        'lieu',
        'latitude',
        'longitude',
        'date_heure',
        'categorie',
        'max_participants',
        'user_id'
    ];

    // Convertir automatiquement ces champs en instances Carbon
    protected $dates = [
        'date_heure',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
    
    public function isUserParticipating($userId)
    {
        return $this->participants()->where('user_id', $userId)->exists();
    }
    
    public function getUserParticipationStatus($userId)
    {
        $participant = $this->participants()->where('user_id', $userId)->first();
        return $participant ? $participant->status : null;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}

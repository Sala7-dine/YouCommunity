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
}

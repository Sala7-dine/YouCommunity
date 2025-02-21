<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'description', 'lieu', 'latitude', 'longitude', 'date_heure', 'categorie', 'user_id', 'max_participants'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

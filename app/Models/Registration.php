<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'seminar_id',
        'participant_id',
        'status',
    ];

    // Relationship with seminar
    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    // Relationship with participant
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
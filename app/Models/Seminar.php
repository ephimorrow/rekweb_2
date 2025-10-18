<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Seminar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'photo',
        'location',
        'datetime',
        'type',
    ];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    // Relationship with registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // Relationship with participants through registrations
    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'registrations')
                    ->withPivot('status')
                    ->withTimestamps();
    }

    // Accessor for photo URL
    public function getPhotoUrlAttribute()
    {
        return $this->photo ? Storage::url($this->photo) : null;
    }

    // Accessor for formatted datetime
    public function getFormattedDatetimeAttribute()
    {
        return $this->datetime->format('d M Y, H:i');
    }

    // Accessor for participants count
    public function getParticipantsCountAttribute()
    {
        return $this->registrations()->count();
    }
}
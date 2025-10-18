<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nim',
        'prodi',
    ];

    // Relationship with registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // Relationship with seminars through registrations
    public function seminars()
    {
        return $this->belongsToMany(Seminar::class, 'registrations')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}
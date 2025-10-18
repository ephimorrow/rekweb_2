<?php

namespace Database\Seeders;

use App\Models\Registration;
use App\Models\Seminar;
use App\Models\Participant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing registrations
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Registration::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $seminars = Seminar::all();
        $participants = Participant::all();

        foreach ($seminars as $seminar) {
            // Register 3-8 random participants for each seminar
            $randomParticipants = $participants->random(rand(3, 8));
            
            foreach ($randomParticipants as $participant) {
                Registration::create([
                    'seminar_id' => $seminar->id,
                    'participant_id' => $participant->id,
                    'status' => 'terdaftar',
                ]);
            }
        }

        // Add some additional random registrations
        for ($i = 0; $i < 10; $i++) {
            $randomSeminar = Seminar::inRandomOrder()->first();
            $randomParticipant = Participant::inRandomOrder()->first();

            // Check if registration already exists
            $existingRegistration = Registration::where('seminar_id', $randomSeminar->id)
                ->where('participant_id', $randomParticipant->id)
                ->exists();

            if (!$existingRegistration) {
                Registration::create([
                    'seminar_id' => $randomSeminar->id,
                    'participant_id' => $randomParticipant->id,
                    'status' => rand(0, 1) ? 'terdaftar' : 'tidak_terdaftar',
                ]);
            }
        }
    }
}
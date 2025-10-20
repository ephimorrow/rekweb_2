<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing participants dengan disable foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Participant::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $participants = [
            ['name' => 'Pedro Gonzalez', 'nim' => '20210001', 'prodi' => 'Teknik Informatika'],
            ['name' => 'Uchiha Sasuke', 'nim' => '20210002', 'prodi' => 'Sistem Informasi'],
            ['name' => 'Portgas D Ace', 'nim' => '20210003', 'prodi' => 'Teknik Komputer'],
            ['name' => 'Caleb', 'nim' => '20210004', 'prodi' => 'Manajemen Informatika'],
            ['name' => 'Sylus', 'nim' => '20210005', 'prodi' => 'Teknik Informatika'],
            ['name' => 'Hector Fort', 'nim' => '20210006', 'prodi' => 'Sistem Informasi'],
            ['name' => 'Keenan Yildiz', 'nim' => '20210007', 'prodi' => 'Teknik Komputer'],
            ['name' => 'Qin Shi Huang', 'nim' => '20210008', 'prodi' => 'Manajemen Informatika'],
            ['name' => 'Marc Bernal', 'nim' => '20210009', 'prodi' => 'Teknik Informatika'],
            ['name' => 'Pau Cubarsi', 'nim' => '20210010', 'prodi' => 'Sistem Informasi'],
            ['name' => 'Anton Lee', 'nim' => '20210011', 'prodi' => 'Teknik Elektro'],
            ['name' => 'Irene Bae', 'nim' => '20210012', 'prodi' => 'Manajemen'],
            ['name' => 'Vivian Ning', 'nim' => '20210013', 'prodi' => 'Ilmu Komputer'],
            ['name' => 'Mina Myoui', 'nim' => '20210014', 'prodi' => 'Desain Komunikasi Visual'],
            ['name' => 'Minatozaki Sana', 'nim' => '20210015', 'prodi' => 'Bisnis Digital'],
        ];

        foreach ($participants as $participant) {
            Participant::create($participant);
        }
    }
}
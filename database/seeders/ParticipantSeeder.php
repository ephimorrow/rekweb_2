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
            ['name' => 'Ahmad Rizki', 'nim' => '20210001', 'prodi' => 'Teknik Informatika'],
            ['name' => 'Siti Nurhaliza', 'nim' => '20210002', 'prodi' => 'Sistem Informasi'],
            ['name' => 'Budi Santoso', 'nim' => '20210003', 'prodi' => 'Teknik Komputer'],
            ['name' => 'Dewi Lestari', 'nim' => '20210004', 'prodi' => 'Manajemen Informatika'],
            ['name' => 'Rizky Pratama', 'nim' => '20210005', 'prodi' => 'Teknik Informatika'],
            ['name' => 'Maya Sari', 'nim' => '20210006', 'prodi' => 'Sistem Informasi'],
            ['name' => 'Fajar Nugroho', 'nim' => '20210007', 'prodi' => 'Teknik Komputer'],
            ['name' => 'Indah Permata', 'nim' => '20210008', 'prodi' => 'Manajemen Informatika'],
            ['name' => 'Hendra Setiawan', 'nim' => '20210009', 'prodi' => 'Teknik Informatika'],
            ['name' => 'Lina Marlina', 'nim' => '20210010', 'prodi' => 'Sistem Informasi'],
            ['name' => 'Joko Widodo', 'nim' => '20210011', 'prodi' => 'Teknik Elektro'],
            ['name' => 'Sri Mulyani', 'nim' => '20210012', 'prodi' => 'Manajemen'],
            ['name' => 'Bambang Pamungkas', 'nim' => '20210013', 'prodi' => 'Ilmu Komputer'],
            ['name' => 'Dian Sastro', 'nim' => '20210014', 'prodi' => 'Desain Komunikasi Visual'],
            ['name' => 'Tommy Suharto', 'nim' => '20210015', 'prodi' => 'Bisnis Digital'],
        ];

        foreach ($participants as $participant) {
            Participant::create($participant);
        }
    }
}
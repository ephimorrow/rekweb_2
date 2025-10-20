<?php

namespace Database\Seeders;

use App\Models\Seminar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SeminarSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing seminars dengan disable foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Seminar::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $seminars = [
            [
                'title' => 'Seminar Skripsi: Teknik Informatika 2024',
                'description' => 'Presentasi hasil penelitian skripsi mahasiswa 
                Teknik Informatika angkatan 2020. Seminar ini menampilkan berbagai penelitian 
                inovatif di bidang teknologi informasi.',
                'location' => 'Aula Utama Kampus',
                'datetime' => Carbon::now()->addDays(7)->setHour(9)->setMinute(0),
                'type' => 'skripsi',
            ],
            [
                'title' => 'Workshop Web Development Modern',
                'description' => 'Pelatihan intensif pengembangan web menggunakan 
                teknologi terbaru seperti Laravel, Vue.js, dan Tailwind CSS. 
                Cocok untuk pemula hingga menengah.',
                'location' => 'Lab Komputer 1',
                'datetime' => Carbon::now()->addDays(14)->setHour(13)->setMinute(30),
                'type' => 'workshop',
            ],
            [
                'title' => 'Seminar Umum: Kecerdasan Buatan dan Masa Depan',
                'description' => 'Diskusi panel tentang perkembangan AI, 
                machine learning, dan dampaknya terhadap industri dan 
                kehidupan sehari-hari.',
                'location' => 'Ruang Seminar Gedung B',
                'datetime' => Carbon::now()->addDays(21)->setHour(10)->setMinute(0),
                'type' => 'umum',
            ],
            [
                'title' => 'Presentasi Skripsi Sistem Informasi',
                'description' => 'Sidang skripsi mahasiswa program studi Sistem Informasi 
                dengan berbagai tema penelitian sistem 
                enterprise dan e-business.',
                'location' => 'Ruang Sidang Fakultas',
                'datetime' => Carbon::now()->addDays(10)->setHour(8)->setMinute(30),
                'type' => 'skripsi',
            ],
            [
                'title' => 'Workshop UI/UX Design Fundamental',
                'description' => 'Pelatihan dasar desain antarmuka pengguna dan 
                pengalaman pengguna untuk aplikasi mobile dan web.',
                'location' => 'Lab Desain Digital',
                'datetime' => Carbon::now()->addDays(17)->setHour(14)->setMinute(0),
                'type' => 'workshop',
            ],
            [
                'title' => 'Seminar Kewirausahaan Teknologi',
                'description' => 'Inspirasi dan strategi memulai bisnis 
                teknologi dari founder startup sukses. 
                Belajar dari pengalaman praktisi industri.',
                'location' => 'Auditorium Kampus',
                'datetime' => Carbon::now()->addDays(25)->setHour(9)->setMinute(0),
                'type' => 'umum',
            ],
        ];

        foreach ($seminars as $seminar) {
            Seminar::create($seminar);
        }
    }
}
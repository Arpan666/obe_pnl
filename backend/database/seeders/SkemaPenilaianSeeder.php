<?php

namespace Database\Seeders;

use App\Models\SkemaPenilaian;
use App\Models\KomponenSkemaPenilaian;
use Illuminate\Database\Seeder;

class SkemaPenilaianSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Skema Teori
        $teori = SkemaPenilaian::create([
            'nama_skema' => 'Skema Penilaian Teori Standard PNL',
            'jenis_mk' => 'teori',
            'deskripsi' => 'Default 20% Tugas, 20% Kuis, 25% UTS, 35% UAS',
            'is_default' => true
        ]);

        KomponenSkemaPenilaian::insert([
            ['skema_penilaian_id' => $teori->id, 'nama_komponen' => 'Rata-rata Tugas Mandiri', 'bobot_persen' => 20.00],
            ['skema_penilaian_id' => $teori->id, 'nama_komponen' => 'Rata-rata Kuis', 'bobot_persen' => 20.00],
            ['skema_penilaian_id' => $teori->id, 'nama_komponen' => 'Ujian Tengah Semester (UTS)', 'bobot_persen' => 25.00],
            ['skema_penilaian_id' => $teori->id, 'nama_komponen' => 'Ujian Akhir Semester (UAS)', 'bobot_persen' => 35.00],
        ]);

        // 2. Skema Praktikum
        $praktikum = SkemaPenilaian::create([
            'nama_skema' => 'Skema Penilaian Praktikum Standard PNL',
            'jenis_mk' => 'praktikum',
            'deskripsi' => 'Default 15% Responsi, 15% Laporan, 30% Hasil/Benda Kerja, 40% Ujian Akhir',
            'is_default' => true
        ]);

        KomponenSkemaPenilaian::insert([
            ['skema_penilaian_id' => $praktikum->id, 'nama_komponen' => 'Responsi dan Kompetensi', 'bobot_persen' => 15.00],
            ['skema_penilaian_id' => $praktikum->id, 'nama_komponen' => 'Laporan Praktikum', 'bobot_persen' => 15.00],
            ['skema_penilaian_id' => $praktikum->id, 'nama_komponen' => 'Hasil / Benda Kerja / Alat', 'bobot_persen' => 30.00],
            ['skema_penilaian_id' => $praktikum->id, 'nama_komponen' => 'Seminar / Ujian Akhir', 'bobot_persen' => 40.00],
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\SkalaNilai;
use Illuminate\Database\Seeder;

class SkalaNilaiPnlSeeder extends Seeder
{
    public function run(): void
    {
        $skala = [
            ['nilai_huruf' => 'A', 'min_angka' => 81.00, 'max_angka' => 100.00, 'bobot_angka' => 4.00, 'predikat' => 'Sangat Baik'],
            ['nilai_huruf' => 'B', 'min_angka' => 65.00, 'max_angka' => 80.99,  'bobot_angka' => 3.00, 'predikat' => 'Baik'],
            ['nilai_huruf' => 'C', 'min_angka' => 50.00, 'max_angka' => 64.99,  'bobot_angka' => 2.00, 'predikat' => 'Cukup'],
            ['nilai_huruf' => 'D', 'min_angka' => 40.00, 'max_angka' => 49.99,  'bobot_angka' => 1.00, 'predikat' => 'Kurang'],
            ['nilai_huruf' => 'E', 'min_angka' => 0.00,  'max_angka' => 39.99,  'bobot_angka' => 0.00, 'predikat' => 'Kurang Sekali / Gagal'],
        ];

        foreach ($skala as $item) {
            SkalaNilai::updateOrCreate(['nilai_huruf' => $item['nilai_huruf']], $item);
        }
    }
}
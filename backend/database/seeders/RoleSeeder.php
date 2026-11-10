<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['nama_role' => 'admin', 'deskripsi' => 'Administrator Prodi'],
            ['nama_role' => 'dosen', 'deskripsi' => 'Dosen Pengampu Mata Kuliah'],
            ['nama_role' => 'kaprodi', 'deskripsi' => 'Ketua Program Studi'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['nama_role' => $role['nama_role']], $role);
        }
    }
}
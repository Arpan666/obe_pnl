<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('nama_role', 'admin')->first();
        $dosenRole = Role::where('nama_role', 'dosen')->first();
        $kaprodiRole = Role::where('nama_role', 'kaprodi')->first();

        // 1. Account Admin Prodi
        User::updateOrCreate(
            ['username' => 'adminprodi'],
            [
                'role_id' => $adminRole->id,
                'email' => 'admin.ti@pnl.ac.id',
                'password' => Hash::make('password123'),
                'is_active' => true,
            ]
        );

        // 2. Account Kaprodi TI
        $kaprodiUser = User::updateOrCreate(
            ['username' => 'kaproditi'],
            [
                'role_id' => $kaprodiRole->id,
                'email' => 'kaprodi.ti@pnl.ac.id',
                'password' => Hash::make('password123'),
                'is_active' => true,
            ]
        );
        Dosen::updateOrCreate(
            ['nip' => '198001012005011001'],
            [
                'user_id' => $kaprodiUser->id,
                'nama_lengkap' => 'Dr. Eng. Kaprodi Teknik Informatika',
                'gelar_depan' => 'Dr. Eng.',
                'gelar_belakang' => 'S.T., M.T.',
                'email_official' => 'kaprodi.ti@pnl.ac.id'
            ]
        );

        // 3. Account Dosen Pengampu
        $dosenUser = User::updateOrCreate(
            ['username' => 'dosenone'],
            [
                'role_id' => $dosenRole->id,
                'email' => 'dosen1@pnl.ac.id',
                'password' => Hash::make('password123'),
                'is_active' => true,
            ]
        );
        Dosen::updateOrCreate(
            ['nip' => '198505122010121002'],
            [
                'user_id' => $dosenUser->id,
                'nama_lengkap' => 'Mizaul Arfan',
                'gelar_depan' => '',
                'gelar_belakang' => 'S.Tr.Kom., M.Kom.',
                'email_official' => 'dosen1@pnl.ac.id'
            ]
        );
    }
}
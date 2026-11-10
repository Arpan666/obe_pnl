<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'role' => $this->role->nama_role ?? null,
            'is_active' => $this->is_active,
            'profile' => $this->when($this->dosen, function () {
                return [
                    'nip' => $this->dosen->nip,
                    'nama_lengkap' => $this->dosen->nama_lengkap,
                    'gelar_depan' => $this->dosen->gelar_depan,
                    'gelar_belakang' => $this->dosen->gelar_belakang,
                ];
            }, $this->when($this->mahasiswa, function () {
                return [
                    'nim' => $this->mahasiswa->nim,
                    'nama_lengkap' => $this->mahasiswa->nama_lengkap,
                    'angkatan' => $this->mahasiswa->angkatan,
                ];
            })),
        ];
    }
}
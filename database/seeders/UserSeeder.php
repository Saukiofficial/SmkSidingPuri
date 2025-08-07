<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID dari setiap role
        $adminRole = Role::where('name', 'admin')->first();
        $teacherRole = Role::where('name', 'guru')->first();
        $studentRole = Role::where('name', 'siswa')->first();

        // 1. Membuat User Admin
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@sekolah.com'],
            [
                'name' => 'Admin Sekolah',
                'password' => Hash::make('admin123'),
            ]
        );
        // Menghubungkan user admin dengan role admin
        $adminUser->roles()->sync($adminRole->id);

        // 2. Membuat User Guru
        $teacherUser = User::firstOrCreate(
            ['email' => 'guru@sekolah.com'],
            [
                'name' => 'Guru Pengajar',
                'password' => Hash::make('admin123'),
            ]
        );
        $teacherUser->roles()->sync($teacherRole->id);

        // 3. Membuat User Siswa
        $studentUser = User::firstOrCreate(
            ['email' => 'siswa@sekolah.com'],
            [
                'name' => 'Siswa Belajar',
                'password' => Hash::make('admin123'),
            ]
        );
        $studentUser->roles()->sync($studentRole->id);
    }
}

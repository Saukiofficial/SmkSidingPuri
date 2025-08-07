<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\User;
use App\Models\Role;
use App\Models\SchoolClass;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // 1. Cari atau buat User baru
        // Membuat email unik sementara berdasarkan nama siswa
        $user = User::firstOrCreate(
            ['email' => strtolower(str_replace(' ', '', $row['nama_siswa'])).'@sekolah.com'],
            [
                'name' => $row['nama_siswa'],
                'password' => Hash::make('password123'), // Default password untuk siswa baru
            ]
        );

        // 2. Beri role 'siswa'
        $studentRole = Role::where('name', 'siswa')->first();
        if ($studentRole) {
            $user->roles()->syncWithoutDetaching([$studentRole->id]);
        }

        // 3. Cari atau buat Kelas baru
        $schoolClass = SchoolClass::firstOrCreate(['name' => $row['kelas']]);

        // 4. Logika untuk Jenis Kelamin yang lebih fleksibel
        // Mengubah teks menjadi huruf kecil dan menghapus spasi/tanda hubung
        $genderText = strtolower(str_replace(['-', ' '], '', $row['jenis_kelamin']));
        $gender = ($genderText == 'lakilaki') ? 'male' : 'female';

        // 5. Buat atau update data Siswa
        // Menggunakan firstOrCreate untuk menghindari duplikasi data siswa berdasarkan user_id
        return Student::firstOrCreate(
            ['user_id' => $user->id],
            [
                'nisn'          => $user->id . rand(1000, 9999), // NISN unik sementara
                'school_class_id' => $schoolClass->id,
                'jurusan'       => $row['jurusan'],
                'gender'        => $gender,
            ]
        );
    }
}

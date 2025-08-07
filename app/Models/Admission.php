<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'full_name',
        'gender',
        'birth_place',
        'birth_date',
        'previous_school',
        'father_name',
        'mother_name',
        'address',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    /**
     * Relasi One-to-Many ke model AdmissionDocument.
     * Satu pendaftaran bisa memiliki banyak dokumen.
     */
    public function documents()
    {
        return $this->hasMany(AdmissionDocument::class);
    }
}

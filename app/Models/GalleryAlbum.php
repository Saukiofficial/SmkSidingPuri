<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relasi One-to-Many ke model Gallery.
     * Satu album memiliki banyak item galeri.
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}

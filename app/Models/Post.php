<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'featured_image_path',
        'type',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Relasi Many-to-One ke model User.
     * Menunjukkan penulis/author dari post ini.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

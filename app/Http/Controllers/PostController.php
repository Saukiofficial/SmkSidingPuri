<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Menampilkan daftar semua berita & pengumuman yang sudah dipublikasi.
     */
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->paginate(9);
        return view('pages.frontend.posts.index', compact('posts'));
    }

    /**
     * Menampilkan detail satu berita/pengumuman.
     */
    public function show(Post $post)
    {
        // Pastikan hanya post yang statusnya 'published' yang bisa diakses
        if ($post->status !== 'published') {
            abort(404);
        }

        // Ambil post terbaru lainnya untuk sidebar, kecuali post yang sedang dilihat
        $latestPosts = Post::where('status', 'published')
                            ->where('id', '!=', $post->id)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('pages.frontend.posts.show', compact('post', 'latestPosts'));
    }
}

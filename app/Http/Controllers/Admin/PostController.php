<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Menampilkan daftar semua post (berita & pengumuman).
     */
    public function index()
    {
        $posts = Post::latest()->paginate(15);
        return view('pages.admin.posts.index', compact('posts'));
    }

    /**
     * Menampilkan form untuk membuat post baru.
     */
    public function create()
    {
        return view('pages.admin.posts.create');
    }

    /**
     * Menyimpan post baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title',
            'content' => 'required|string',
            'type' => 'required|in:news,announcement',
            'status' => 'required|in:published,draft',
            'featured_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20000',
        ]);

        $path = null;
        if ($request->hasFile('featured_image_path')) {
            $path = $request->file('featured_image_path')->store('posts', 'public');
        }

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'type' => $request->type,
            'status' => $request->status,
            'published_at' => $request->status == 'published' ? now() : null,
            'featured_image_path' => $path,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit post.
     */
    public function edit(Post $beritum)
    {
        return view('pages.admin.posts.edit', ['post' => $beritum]);
    }

    /**
     * Memperbarui post di database.
     */
    public function update(Request $request, Post $beritum)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title,' . $beritum->id,
            'content' => 'required|string',
            'type' => 'required|in:news,announcement',
            'status' => 'required|in:published,draft',
            'featured_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $beritum->featured_image_path;
        if ($request->hasFile('featured_image_path')) {
            // Hapus gambar lama jika ada
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('featured_image_path')->store('posts', 'public');
        }

        $beritum->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'type' => $request->type,
            'status' => $request->status,
            'published_at' => $request->status == 'published' && !$beritum->published_at ? now() : $beritum->published_at,
            'featured_image_path' => $path,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    /**
     * Menghapus post dari database.
     */
    public function destroy(Post $beritum)
    {
        // Hapus gambar terkait dari storage
        if ($beritum->featured_image_path) {
            Storage::disk('public')->delete($beritum->featured_image_path);
        }

        $beritum->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}

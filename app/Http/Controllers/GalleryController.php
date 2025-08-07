<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman utama galeri dengan semua album.
     */
    public function index()
    {
        $albums = GalleryAlbum::with('galleries')->latest()->paginate(12);
        return view('pages.frontend.gallery.index', compact('albums'));
    }

    /**
     * Menampilkan isi dari satu album galeri.
     */
    public function show(GalleryAlbum $galleryAlbum)
    {
        // Eager load galleries untuk efisiensi query
        $album = $galleryAlbum->load('galleries');
        return view('pages.frontend.gallery.show', compact('album'));
    }
}
